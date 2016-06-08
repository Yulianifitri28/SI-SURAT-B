<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\SuratMasuk;
use App\JenisSurat;
use App\User; 
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\FormsmRequest;

class SrtmskController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function lihatsm(request $request)
    {
    	if (Auth::user()->level != 0) {
        	return redirect('/');
        }

        $masuks=SuratMasuk::with('jenis')->with('us')->where('lihat', 0)->get();
        return view('admin.lihatsm', compact('masuks', 'request'));
    }

    public function inputsm(request $request)
    {
    	if (Auth::user()->level != 0) {
        	return redirect('/');
        }
        $users=User::where('level', '!=', 0)->orderBy('name')->lists('name', 'id');
        $surats=JenisSurat::orderBy('id_surat')->lists('jenis_surat', 'id_surat');
        return view('admin.inputsm', compact('users', 'surats', 'request'));
    }

    public function submitsm(FormsmRequest $request)
    {
    	if (Auth::user()->level != 0) {
        	return redirect('/');
        }

        $param = $request->all();
        $fileName = $request->file('file')->getClientOriginalName();
        $destinationPath = 'file/';
        $proses = $request->file('file')->move($destinationPath, $fileName);
        $dest = 'file/'.$fileName;

        $srtms=new SuratMasuk;
        $srtms->id_surat = $request->jenis;
        $srtms->tgl_terima = $request->tanggal;
        $srtms->no_sm = $request->no;
        $srtms->tgl_sm = $request->tanggals;
        $srtms->hal_sm = $request->hal;
        $srtms->lampiran = $request->lamp;
        $srtms->file_sm = $dest;
        $srtms->asal_sm = $request->asal;
        $srtms->id_user = $request->pen;

        	$srtms->save();
        
        	return redirect('/admin/lihatsm')->with('message', 'Surat masuk berhasil disimpan.');
    	
    }

    public function arsipsm(request $request)
    {
        if(empty($request->tanggals))
        {
            $date = date('Y-m-d');
            
        }
        else
        {
            $date = $request->tanggals;
        }
        $id=Auth::user()->id;
        if(Auth::user()->level==0)
        {
            $masuks=SuratMasuk::with('jenis')->where('tgl_terima', $date)->orderBy('id_sm', 'desc')->get();
            return view('admin.arsipsm', compact('masuks', 'date', 'request'));
        }
        elseif (Auth::user()->level==1) {
            $masuks=SuratMasuk::with('jenis')->where('tgl_terima', $date)->where('id_user', $id)->orderBy('id_sm', 'desc')->get();
            return view('kajur.arsipsmkajur', compact('masuks', 'date', 'request'));
        }
        else {
            $masuks=SuratMasuk::with('jenis')->where('id_user', $id)->orderBy('id_sm', 'desc')->get();
            return view('user.lihatsm', compact('masuks', 'request'));
        }
    }

    public function ktkmsk(request $request)
    {
        if (Auth::user()->level == 0) {
            return redirect('/');
        }
        $khusus=Auth::user()->id;
        $masuks=SuratMasuk::with('jenis')->where('id_user', $khusus)->where('lihat', '0')->orderBy('tgl_sm', 'desc')->get();

        if(Auth::user()->level==1)
        {
            return view('kajur.lihatsmkajur', compact('khusus','masuks', 'request'));
        }
        else
        {
            return view('user.lihatsm', compact('khusus','masuks', 'request'));
        }
    }

    public function hapussm(request $request)
    {
       if (Auth::user()->level == 0) {
            return redirect('/');
        }

        $surus=SuratMasuk::where('id_sm', $request->id_sm)->first();
        $surus->lihat=1;
        $surus->save();
        if(Auth::user()->level ==1)
        {
            return redirect('/kajur/srtmsk');
        }
        else{
            return redirect('/suratmasuk');
        }
    }

}
