<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/...','AdminController@maintenance');
Route::get('/siswakelas/{id}','SiswaaController@siswakelas');

Route::post('/printhistory','HistoryController@print');
Route::get('/printsiswa/{id}','HistoryController@printsiswa');

	

Route::group(['middleware'=>['auth']], function(){
Route::resource('/user', 'UserController');
Route::get('/walikelas', 'UserController@walikelas');

Route::get('/admin', 'UserController@admin');
Route::get('/bk', 'UserController@bk');
Route::get('/kepsek', 'UserController@kepsek');
Route::get('/wawali', 'UserController@wawali');

Route::get('/walikelas/{id}', 'UserController@walikelass');
Route::resource('/kelas', 'KelasController');
Route::get('pdf', 'PDFController@pdf');
Route::resource('/siswa', 'SiswaaController');
Route::resource('/kelas', 'KelasController');
Route::resource('/prestasis', 'PrestasiController');
Route::resource('/penilaian', 'penilaianController');
Route::get('/pelanggaran/{id}', 'penilaianController@pelanggaran');
Route::get('/prestasi/{id}', 'penilaianController@prestasi');
Route::get('/detail/{id}', 'SiswaaController@detail');
Route::resource('/home', 'HomeController');
Route::resource('/jenis', 'Pelanggaran_PrestasiController');
Route::resource('/asc', 'ascController');
Route::resource('/des', 'desController');
Route::resource('/now', 'nowController');
Route::resource('/history', 'HistoryController');
Route::post('/tambah/{id}', 'UserController@tambah');


Route::post('/storewali', 'UserController@storewali');
Route::post('/storeadmin', 'UserController@storeadmin');
Route::post('/storebk', 'UserController@storebk');
Route::post('/storekepsek', 'UserController@storekepsek');



Route::post('/hapusadmin/{id}', 'UserController@hapusadmin');
Route::post('/hapusbk/{id}', 'UserController@hapusbk');
Route::post('/hapuskepsek/{id}', 'UserController@hapuskepsek');
Route::post('/hapuswali/{id}', 'UserController@hapuswali');


	Route::get('/','AuthController@login');
	Route::get('/edit','User\UserController@editprofile');
	Route::resource('view','EditController');
	Route::resource('ea','User\EducationController');
	Route::resource('ex','User\ExController');
	Route::resource('position','User\PositionController');
	Route::resource('index','User\UserController');

});

Route::get('/Route', function () {
    return view('layouts.admin');
});

Route::get('/Settings','SettingsController@drop');
Route::get('pdf', 'PDFController@pdf');