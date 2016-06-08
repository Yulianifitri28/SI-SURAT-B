<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use App\Http\Requests;
use App\Http\Requests\RegistRequest;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function setadmin()
    {
        $user = \App\User::findOrNew(1);
        $user->id = 1;
        $user->name = 'Admin';
        $user->username = 'admin';
        $user->level = 0;
        $user->email = 'admin@portal.co.id';
        $user->password = bcrypt("admin");
        $user->save();

        return redirect('/');
    }

    public function admin(Request $request)
    {
        if (Auth::user()->level != 0) {
            return redirect('/');
        }
        return view('admin.home', compact('request'));
    }

    public function kajur(Request $request)
    {
        if (Auth::user()->level != 1) {
            return redirect('/');
        }
        return view('kajur.homekajur',compact('request'));
    }

    public function user(Request $request)
    {
        if (Auth::user()->level != 2 && Auth::user()->level != 3) {
            return redirect('/');
        }
        return view('user.homeuser', compact('request'));
    }

    public function registeruser(Request $request)
    {
    if (Auth::user()->level != 0) {
            return redirect('/');
        }
    return view('admin.registeruser', compact('request'));
	}

	public function daftaruser(RegistRequest $request)
    {
    if (Auth::user()->level != 0) {
            return redirect('/');
        }

        if(empty($request->name))
        {
            return view('admin.registeruser', compact('request')); 
        }
        else
        {
        	$user=new User;
	        $user->name = $request->name;
	        $user->email = $request->email;
	        $user->username = $request->username;
            $user->nim = $request->nim;
	        $user->password = bcrypt($request->password);
	        $user->level = $request->level;
	        $user->save();

            return redirect('/admin/registeruser')->with('message', 'Akun user berhasil disimpan.');
        }
	}
    public function ubahpwd(Request $request)
    {
        if(Auth::user()->level==0)
        {
            return view('admin.ubahpw', compact('request'));
        }
        elseif(Auth::user()->level==1)
        {
            return view('kajur.ubahpw', compact('request'));
        }
        else
        {
            return view('user.ubahpw', compact('request'));
        }
    }

    public function gantipw(request $request)
    {
        $id=Auth::user()->id;
        $pass=Auth::user()->password;
        if(Hash::check($request->passwordl, $pass)==true) {
            $user = \App\User::findOrNew($id);
            $user->password = bcrypt($request->passwordb);
            $user->save();
            return redirect('/ubahpwd')->with('message', 'Ganti password berhasil.');
        }
        else{
            return redirect('/ubahpwd')->with('message', 'Password lama salah.');
        }
    }

    public function datakajur(request $request)
    {
        return redirect('/');
    }
    
}
