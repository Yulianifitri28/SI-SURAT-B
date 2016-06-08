<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Disposisi;
use App\SuratMasuk;
use App\User;
use App\DisposisiUser;
use Session;
use App\Http\Requests;

class DisposisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function buatdisposisi(request $request)
    {
   		if (Auth::user()->level != 1) {
        return redirect('/');
    	}
    	$id_sm=$request->id_sm;

    	$masuk=SuratMasuk::where('id_sm', $id_sm)->first();
    	
    	return redirect('/kajur/disposisi')->with('masuk',$masuk);

    }

    public function input(request $request)
    {
   		if (Auth::user()->level != 1) {
        return redirect('/');
    	}
    	$masuk=Session::get('masuk');
    	$no_sm=$masuk->no_sm;
    	$id_sm=$masuk->id_sm;
    	return view('kajur.inputdisposisi', compact('no_sm', 'id_sm', 'request'));

    }

    public function submit(request $request)
    {
   		if (Auth::user()->level != 1) {
        return redirect('/');
    	}

    	$ndis=new Disposisi;
        $ndis->id_sm = $request->id_sm;
        $ndis->sifat_disposisi = $request->prioritas;
        $ndis->instruksi = $request->instruksi;
        $ndis->tanggal = date('Y-m-d');
        $ndis->save();
        
        $lihat=SuratMasuk::findOrNew($request->id_sm);
        $lihat->lihat=1;
        $lihat->save();

        $getdis=Disposisi::orderBy('id_disposisi', 'desc')->first();
        $id_dis=$getdis->id_disposisi;
        return redirect('/kajur/pnrmdisposisi')->with('id_dis', $id_dis);

    }

    public function pnrm(request $request)
    {
   		if (Auth::user()->level != 1) {
        return redirect('/');
    	}

    	$id_dis=Session::get('id_dis');
        $admins=User::where('level', 0)->get();
    	$dosens=User::where('level', 2)->get();
    	$mhss=User::where('level', 3)->get();
    	return view('kajur.pilihpenerima', compact('id_dis', 'dosens', 'mhss', 'admins', 'request'));
    }

    public function sbmpnrm(request $request)
    {
   		if (Auth::user()->level != 1) {
        return redirect('/');
    	}

        if($request->admin[0]!='')
        {
        	foreach($request->admin as $dos){
        		$disu=new DisposisiUser;
        		$disu->id_disposisi=$request->id_dis;
        		$disu->id_user=$dos;
                $disu->tanggal=date('Y-m-d');
        		$disu->save();
        	}
        }

        if($request->dosen[0]!='')
        {
        	foreach($request->dosen as $dos){
        		$disu=new DisposisiUser;
        		$disu->id_disposisi=$request->id_dis;
        		$disu->id_user=$dos;
                $disu->tanggal=date('Y-m-d');
        		$disu->save();
        	}
        }

        if($request->mhs[0]!='')
        {
        	foreach($request->mhs as $dos){
        		$disu=new DisposisiUser;
        		$disu->id_disposisi=$request->id_dis;
        		$disu->id_user=$dos;
                $disu->tanggal=date('Y-m-d');
        		$disu->save();
        	}
        }

        $user = Disposisi::findOrNew($request->id_dis);
        $user->kirim = 1;
        $user->save();
    	
    	return redirect('/kajur/srtmsk')->with('message', 'Disposisi berhasil dikirim.');
    }

    public function disposisi(request $request)
    {
        if (Auth::user()->level == 1) {
        return redirect('/');
        }
        $id=Auth::user()->id;
        $disp=DisposisiUser::with('disp')->where('lihat', 0)->where('id_user', $id)->get();
        $x=0;
        $disps[0]='x';
            foreach ($disp as $dis) {
                
                $disps[$x]=$dis->disp;
                $x=$x+1;
            }
        if($disps[0]!='x')
        {
            $x=0;
            foreach ($disps as $disp) {
                
                
                $sur=SuratMasuk::where('id_sm', $disp->id_sm)->first();
                $links[$x]=$sur->file_sm;
                $x=$x+1;
            }
        }
        if(Auth::user()->level==0)
        {
            return view('admin.disposisimasuk', compact('links','disps', 'request'));
        }
        else
        {
            return view('user.disposisimasuk', compact('links','disps', 'request'));
        }
    }

    public function arsipdisp(request $request)
    {

        if (Auth::user()->level == 0 || Auth::user()->level == 1) {
        return redirect('/');
        }
        $id=Auth::user()->id;
        $disp=DisposisiUser::with('disp')->where('id_user', $id)->get();
        $x=0;
        $disps[0]='x';
            foreach ($disp as $dis) {
                
                $disps[$x]=$dis->disp;
                
                $x=$x+1;
            }
        if($disps[0]!='x')
        {
            $x=0;
            foreach ($disps as $disp) {
                
                
                $sur=SuratMasuk::where('id_sm', $disp->id_sm)->first();
                $links[$x]=$sur->file_sm;
                $x=$x+1;
            }
        }
        return view('user.arsipdisp', compact('links','disps', 'request'));

    }

    public function arsipdisadm(request $request)
    {
        if (Auth::user()->level != 0) {
        return redirect('/');
        }

        if(empty($request->tanggals))
        {
            $date = date('Y-m-d');
            
        }
        else
        {
            $date = $request->tanggals;
        }

        $disps=Disposisi::where('kirim','!=',0)->where('tanggal', $date)->with('sm')->get();
        foreach($disps as $disp)
        {
            $dispus=DisposisiUser::with('us')->where('id_disposisi', $disp->id_disposisi)->get();
            foreach($dispus as $dis)
            {
                $disp->penerima=$disp->penerima.$dis->us->name.". ";
            }
        }
        
        return view('admin.arsipdisp', compact('disps', 'date', 'request'));

    }

    public function donedisp(request $request)
    {
        if (Auth::user()->level == 1) {
        return redirect('/');
        }

        $disus=DisposisiUser::where('id_disposisi', $request->id_disp)->where('id_user', Auth::user()->id)->first();
        $disus->lihat=1;
        $disus->save();
        if(Auth::user()->level ==0)
        {
            return redirect('/admin/disposisi');
        }
        else{
            return redirect('/dmus');
        }
    }
}
