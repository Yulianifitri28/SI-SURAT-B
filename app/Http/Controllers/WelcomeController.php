<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	 public function __construct()
 	{
 		$this->middleware('auth');
 	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = Auth::user();

        if ($user->level == 0){
            return redirect('/admin');
        }
        elseif ($user->level == 1) {
            return redirect('/kajur');
        }
        elseif ($user->level == 2) {
            return redirect('/dosen');
        }
         elseif ($user->level == 3) {
            return redirect('/mhs');
        }
	}

	public function ua()
	{
		return view('404');
	}

}
