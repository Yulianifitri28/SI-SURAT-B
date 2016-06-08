<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Illuminate\Routing\Controller;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logins(){
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        else{
            return redirect('/')->with('message', 'Login Gagal');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}