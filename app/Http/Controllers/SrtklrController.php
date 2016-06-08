<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\JenisSurat;
use App\SuratKeluar;
use App\SuratUser;
use Session;
use App\User;
use App\Http\Requests\MintasuratRequest;


class SrtklrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function lihatsk(request $request)
    {
    	if (Auth::user()->level != 0) {
        	return redirect('/');
        }
        $keluars=SuratKeluar::where('id_user', 1)->where('status',0)->get();
        return view('admin.lihatsk', compact('keluars', 'request'));
    }

    public function inputsk(request $request)
    {
        if (Auth::user()->level != 0) {
            return redirect('/');
        }
        $list=JenisSurat::where('jabatan', '!=', 2)->where('jabatan','!=',3)->orderBy('id_surat')->lists('jenis_surat', 'id_surat');

        return view('admin.inputsk', compact('list', 'request'));
    }

    public function submitsk(request $request)
    {
        if (Auth::user()->level != 0) {
            return redirect('/');
        }
        $param = $request->all();
        $fileName = $request->file('file')->getClientOriginalName();
        $destinationPath = 'file/';
        $proses = $request->file('file')->move($destinationPath, $fileName);
        $dest = 'file/'.$fileName;

        $srtms=new SuratKeluar;
        $srtms->id_jenis_surat = $request->jenis;
        $srtms->hal_sk = $request->hal;
        $srtms->alamat_surat = $request->alamat;
        $srtms->tembusan= $request->tem;
        $srtms->id_user= 1;
        $srtms->file = $dest;
        $srtms->req=1;
        $srtms->save();
        
        return redirect('/admin/lihatsk')->with('message', 'Surat berhasil diinputkan, silahkan print');
        
    }

    public function request(request $request)
    {
    	if (Auth::user()->level != 2 && Auth::user()->level != 3) {
        	return redirect('/');
        }
        $id=Auth::user()->level;
        if($id==2){
            $list=JenisSurat::where('jabatan','!=', 3)->orderBy('id_surat')->lists('jenis_surat', 'id_surat');  
        }
        else
        {
            $list=JenisSurat::where('jabatan','!=', 2)->orderBy('id_surat')->lists('jenis_surat', 'id_surat'); 
        }
       
        return view('user.mintasurat', compact('list', 'request'));
    }

    public function submitreq(MintasuratRequest $request)
    {
    	if (Auth::user()->level != 2 && Auth::user()->level != 3) {
        	return redirect('/');
        }
        
        $tipe=JenisSurat::where('id_surat', $request->jenis)->first();

        $sk=new SuratKeluar;
        $sk->hal_sk=$request->hal;
        $sk->id_jenis_surat=$request->jenis;
        $sk->alamat_surat=$request->tujuan;
        $sk->save();

        $getsk=SuratKeluar::orderBy('id_sk', 'desc')->first();

        if($tipe->penerima == 1)
        {
        	return redirect('/pilihperson')->with('id_sk', $getsk->id_sk);
        }
        else
        {
	    		$surus=new SuratUser;
	    		$surus->id_sk=$getsk->id_sk;
	    		$surus->id_user=Auth::user()->id;
	            $surus->tanggal=date('Y-m-d');
	    		$surus->save();

	    		$sk = SuratKeluar::findOrFail($getsk->id_sk);
	    		$sk->id_user=Auth::user()->id;
	    		$sk->save();

        	return redirect('/')->with('message', 'Permintaan surat berhasil dikirim');
        }
    }

    public function pilihperson(request $request)
    {
    	if (Auth::user()->level != 2 && Auth::user()->level != 3) {
        	return redirect('/');
        }
        $id=Auth::user()->level; 
    	$id_sk=Session::get('id_sk');
    	$dosens=User::where('level', 2)->get();
        $mhss=User::where('level', 3)->get();
    	return view('user.pilihperson', compact('id_sk', 'dosens', 'mhss', 'request'));
    }

    public function submitperson(request $request)
    {
   		if (Auth::user()->level != 2 && Auth::user()->level != 3) {
        	return redirect('/');
        }
        if($request->dosen[0]!='')
        {
            foreach($request->dosen as $dos){
                $surus=new SuratUser;
                $surus->id_sk=$request->id_sk;
                $surus->id_user=$dos;
                $surus->tanggal=date('Y-m-d');
                $surus->save();
            }
        }

        if($request->mhs[0]!='')
        {
            foreach($request->mhs as $dos){
                $surus=new SuratUser;
                $surus->id_sk=$request->id_sk;
                $surus->id_user=$dos;
                $surus->tanggal=date('Y-m-d');
                $surus->save();
            }
        }
        
    		$sk = SuratKeluar::findOrFail($request->id_sk);
    		$sk->id_user=Auth::user()->id;
	    	$sk->save();

    	return redirect('/')->with('message', 'Permintaan berhasil dikirim.');
    }

    public function statussurat(request $request)
    {
    	if (Auth::user()->level != 2 && Auth::user()->level != 3) {
        	return redirect('/');
        }
        
        $reqs=SuratUser::where('id_user', Auth::user()->id)->with('sur')->orderBy('id_sk', 'desc')->get();
        foreach($reqs as $req)
        {
            $req->lihat=1;
            $req->save();

        	$jenis=JenisSurat::where('id_surat', $req->sur->id_jenis_surat)->first();
        	$req->jenis=$jenis->jenis_surat;

        	if($req->sur->status==0)
        	{
        		$req->status='Belum Disetujui';
        	}
        	elseif($req->sur->status==1)
        	{
        		$req->status='Telah Disetujui';
        	}
        	elseif($req->sur->status==2)
        	{
        		$req->status='Ditolak';
        	}
        	$surats=SuratUser::where('id_sk', $req->id_sk)->with('us')->get();

        	foreach($surats as $surat)
        	{
        		$req->terlibat=$req->terlibat.$surat->us->name.".";

        	}
        }
        return view('user.statusurat', compact('reqs', 'request'));
    }

    public function permintaan(request $request)
    {
    	if (Auth::user()->level != 0) {
        	return redirect('/');
        }
        $surats=SuratKeluar::where('id_user','!=', 0)->where('req', 0)->with('us')->with('jenis')->get();

        foreach($surats as $surat)
        {	
        	$surus=SuratUser::where('id_sk', $surat->id_sk)->with('us')->get();
        	foreach($surus as $suru)
        	{
        		$nama=$suru->us->name;
        		$nim=$suru->us->nim;
        		$surat->terlibat=$surat->terlibat.$nama."(".$nim.")".".";
        	}
        }
        return view('admin.permintaansurat', compact('surats', 'request'));
    }

    public function uploadsurat(request $request)
    {
    	if (Auth::user()->level != 0) {
        	return redirect('/');
        }
        
        $id=$request->id_sk;
        $surat=SuratKeluar::where('id_sk', $id)->with('us')->with('jenis')->first();

        return view('admin.upload', compact('surat', 'request'));
    }

    public function uploadf(request $request)
    {
    	if (Auth::user()->level != 0) {
        	return redirect('/');
        }
        
        $param = $request->all();
        $fileName = $request->file('file')->getClientOriginalName();
        $destinationPath = 'file/';
        $proses = $request->file('file')->move($destinationPath, $fileName);
        $dest = 'file/'.$fileName;

        $id_sk=$request->id_sk;

        $sk=SuratKeluar::findOrFail($id_sk);
        $sk->req=1;
        $sk->file=$dest;
        $sk->save();

        return redirect('/admin/permintaansurat')->with('message','Surat berhasil diajukan');
    }

    public function persetujuan(request $request)
    {
    	if (Auth::user()->level != 0) {
        	return redirect('/');
        }
        
        $surats=SuratKeluar::where('req','1')->with('us')->with('jenis')->orderBy('tgl_sk', 'desc')->get();
        foreach($surats as $surat)
        {
	        if($surat->status==0)
	    	{
	    		$surat->status='Belum Disetujui';
	    	}
	    	elseif($surat->status==1)
	    	{
	    		$surat->status='Telah Disetujui';  	
	    	}
	    	else
	    	{
	    		$surat->status='Ditolak';
	    	}
	    }

        return view('admin.statusurat', compact('surats', 'request'));
    }

     public function statusurat(request $request)
    {
    	if (Auth::user()->level != 1) {
        	return redirect('/');
        }
        
        $surats=SuratKeluar::where('req','1')->where('status',0)->with('us')->with('jenis')->orderBy('tgl_sk', 'desc')->get();
        foreach($surats as $surat)
        {	
        	$surus=SuratUser::where('id_sk', $surat->id_sk)->with('us')->get();
        	foreach($surus as $suru)
        	{
        		$nama=$suru->us->name;
        		$nim=$suru->us->nim;
        		$surat->terlibat=$surat->terlibat.$nama."(".$nim.")".".";
        	}
        }
        return view('kajur.statusurat', compact('surats', 'request'));
    }

    public function setuju(request $request)
    {
    	if (Auth::user()->level != 1) {
        	return redirect('/');
        }

		$nos = SuratKeluar::orderBy('no','desc')->first();
		$no = $nos->no+1;
		$sur = SuratKeluar::where('id_sk', $request->id_sk)->with('jenis')->first();
		$jenis= $sur->jenis->kode_surat;
		$nox = $no."/UN16.15.5.2/".$jenis."/".date('Y');

		$surat=SuratKeluar::findOrFail($request->id_sk);
		$surat->status=1;
        $surat->tgl_sk=date('Y-m-d');
        $surat->no=$no;
        $surat->no_sk=$nox;
        $surat->save();

        return redirect('kajur/statusurat')->with('message', 'Surat telah disetujui');
    }

    public function tolak(request $request)
    {
    	if (Auth::user()->level != 1) {
        	return redirect('/');
        }
		
		$surat=SuratKeluar::findOrFail($request->id_sk);
        $surat->isi_sk=$request->alasan;
		$surat->status=2;

        $surat->save();

        return redirect('kajur/statusurat')->with('message', 'Surat telah ditolak');
    }

    public function alasantolak(request $request)
    {
        if (Auth::user()->level != 1) {
            return redirect('/');
        }

        $id_sk=$request->id_sk;
        return view('kajur.alasantolak', compact('id_sk', 'request'));
    }

    public function arsipsk(request $request)
    {
        if (Auth::user()->level != 0 && Auth::user()->level !=1) {
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

        $id=Auth::user()->id;
        if(Auth::user()->level==0)
        {
            $keluars=SuratKeluar::with('jenis')->with('us')->where('status', 1)->where('tgl_sk', $date)->orderBy('id_sk', 'desc')->get();
            return view('admin.arsipsk', compact('keluars', 'date', 'request'));
        }
        elseif(Auth::user()->level==1) 
        {
            $keluars=SuratKeluar::with('jenis')->where('status', 1)->where('tgl_sk', $date)->where('id_user', 1)->orderBy('id_sk', 'desc')->get();
            return view('kajur.arsipskkajur', compact('keluars', 'date', 'request'));
        }
    }

    public function tlhlihatsk(request $request)
    {
        if (Auth::user()->level != 0) {
            return redirect('/');
        }

        $id_sk=SuratKeluar::findOrFail($request->id_sk);
        $id_sk->req=2;
        $id_sk->save();
        return redirect('/admin/statusurat');
    }
}
