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

Route::get('/', function () { return view('welcome'); });

Route::auth();
Route::resource('/home', 'HomeController');


//ADMIN==============================================================
//-------load--------------
Route::resource('/admin','AdminController');
Route::get('/admin2','AdminController@loadAdmin2');
Route::get('/admin3','AdminController@loadAdmin3');
Route::get('/getdiklat','AdminController@getdatadiklat');


//-------CRUD--------------
Route::resource('/admin-modul','AdminModulController');
Route::resource('/admin-modul-hapus','AdminModulController@destroy');

Route::resource('/admin-laporan','AdminLaporanController');
Route::resource('/admin-sertifikat','AdminSertifikatController');
Route::resource('/admin-diklat','AdminDiklatController');
Route::resource('/admin-sub-ktg','AdminSubKtgController');

Route::resource('/admin-eval','AdminEvalController');
Route::resource('/admin-eval-grafik','AdminEvalController@loadGrafik');


//USER================================================================
Route::resource('/user-diklat','UserController');
Route::resource('/user-data','UserController@showData');