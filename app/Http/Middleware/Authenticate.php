<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\SuratMasuk;
use App\SuratKeluar;
use App\SuratUser;
use App\Disposisi;
use App\DisposisiUser;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        if(Auth::user()->level==0)
        {
            $data[0]=SuratKeluar::where('id_user','!=', 0)->where('req', 0)->count();
            $data[2]=SuratKeluar::where('req',1)->where('status','!=', 0)->count();
            $data[1]=DisposisiUser::where('id_user', Auth::user()->id)->where('lihat', 0)->count();
            $data[3]=$data[0]+$data[1]+$data[2];
            $request->data=$data;
        }
        elseif(Auth::user()->level==1)
        {
            $data[0]=SuratMasuk::where('id_user', Auth::user()->id)->where('lihat', 0)->count();
            $data[1]=SuratKeluar::where('req',1)->where('status',0)->count();
            $data[3]=$data[0]+$data[1];
            $request->data=$data;
        }
        else
        {
            $data[0]=SuratMasuk::where('id_user', Auth::user()->id)->where('lihat', 0)->count();
            $data[1]=SuratUser::where('lihat', 0)->where('id_user', Auth::user()->id)->count();
            $data[2]=DisposisiUser::where('lihat', 0)->where('id_user', Auth::user()->id)->count();
            
            $data[3]=$data[0]+$data[1];
            $request->data=$data;
        }

        return $next($request);
    }
}
