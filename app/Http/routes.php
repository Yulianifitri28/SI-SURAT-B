<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('default');
});

Route::resource('/', 'WelcomeController@index');
Route::get('/login', 'AuthController@logins');
Route::post('/login', 'AuthController@authenticate');
Route::get('/logout', 'AuthController@logout');

//user
Route::get('/admin', 'UserController@admin');
Route::get('/kajur', 'UserController@kajur');
Route::get('/dosen', 'UserController@user');
Route::get('/mhs', 'UserController@user');
Route::get('/setadmin', 'UserController@setadmin');
Route::get('/ubahpwd', 'UserController@ubahpwd');
Route::post('/gantipw', 'UserController@gantipw');
Route::resource('/dataadmin', 'UserController@dataadmin');
Route::resource('/datakajur', 'UserController@datakajur');

//admin
Route::get('/admin/lihatsm', 'SrtmskController@lihatsm');
Route::get('/admin/lihatsk', 'SrtklrController@lihatsk');
Route::get('/admin/inputsm', 'SrtmskController@inputsm');
Route::get('/admin/inputsk', 'SrtklrController@inputsk');
Route::post('/admin/submitsk', 'SrtklrController@submitsk');
Route::get('/admin/arsipsm', 'SrtmskController@arsipsm');
Route::post('/admin/carism', 'SrtmskController@arsipsm');
Route::post('/admin/carism', 'SrtmskController@arsipsm');
Route::get('/admin/registeruser', 'UserController@registeruser');
Route::get('/admin/disposisi', 'DisposisiController@disposisi');
Route::get('/admin/arsipdisp', 'DisposisiController@arsipdisadm');
Route::post('/admin/caridisp', 'DisposisiController@arsipdisadm');
Route::get('/admin/permintaansurat', 'SrtklrController@permintaan');
Route::post('/admin/uploadsurat', 'SrtklrController@uploadsurat');
Route::post('/admin/uploadf', 'SrtklrController@uploadf');
Route::get('/admin/statusurat', 'SrtklrController@persetujuan');
Route::get('/admin/arsipsk', 'SrtklrController@arsipsk');
Route::post('/admin/carisk', 'SrtklrController@arsipsk');
Route::post('/admin/telahlihat', 'SrtklrController@tlhlihatsk');
Route::post('/admin/hapusdisp', 'DisposisiController@donedisp');

//kajur
Route::get('/kajur/srtmsk', 'SrtmskController@ktkmsk');
Route::get('/kajur/arsipsm', 'SrtmskController@arsipsm');
Route::post('/kajur/buatdisposisi', 'DisposisiController@buatdisposisi');
Route::get('/kajur/disposisi', 'DisposisiController@input');
Route::post('/kajur/submitdisposisi', 'DisposisiController@submit');
Route::get('/kajur/pnrmdisposisi', 'DisposisiController@pnrm');
Route::post('kajur/submitpnrm', 'DisposisiController@sbmpnrm');
Route::get('kajur/statusurat', 'SrtklrController@statusurat');
Route::get('kajur/arsipsk', 'SrtklrController@arsipsk');
Route::post('kajur/setuju', 'SrtklrController@setuju');
Route::post('kajur/tolak', 'SrtklrController@tolak');
Route::post('kajur/alasantolak', 'SrtklrController@alasantolak');
Route::post('/kajur/hapussm', 'SrtmskController@hapussm');

//user
Route::get('/dmus', 'DisposisiController@disposisi');
Route::get('/suratmasuk', 'SrtmskController@ktkmsk');
Route::get('/arsipsm', 'SrtmskController@arsipsm');
Route::get('/arsipdisp', 'DisposisiController@arsipdisp');
Route::get('/mintasurat', 'SrtklrController@request');
Route::get('/pilihperson', 'SrtklrController@pilihperson');
Route::post('/submitperson', 'SrtklrController@submitperson');
Route::get('/statussurat', 'SrtklrController@statussurat');
Route::post('/hapussm', 'SrtmskController@hapussm');


//validasi form input
Route::group(['middleware' => 'web'], function(){
	Route::resource('/admin/submitsm', 'SrtmskController@submitsm'); //input surat masuk
	Route::resource('/admin/daftaruser', 'UserController@daftaruser'); //regist user
	Route::resource('/submitreq', 'SrtklrController@submitreq'); //minta surat
});
