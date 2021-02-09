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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/homeuser', 'HomeController@homeuser');


Route::group(['middleware'=> ['auth','checkRole:admin'] ],function(){
     Route::get('/datakaryawan', 'KaryawanController@index');
     Route::get('/add', 'KaryawanController@add');
    
     Route::post('/datakaryawan/store','KaryawanController@store');
     Route::post('/divisi/save','KaryawanController@adddivisi');

     Route::get('/datakaryawan/{karyawan}/profile','KaryawanController@show');
     Route::get('/datakaryawan/{karyawan}/delete','KaryawanController@destroy');
     Route::patch('/datakaryawan/{karyawan}','KaryawanController@update');
     Route::get('/dataabsensi','dataabsen@index');
     Route::get('/inputabsen','absencontroller@input');
     Route::get('/absen/export','dataabsen@export');

     Route::get('/divisi','divisicontroller@index');
     Route::get('/divisi/{divisi}/delete','divisicontroller@destroy');
     

    });

Route::group(['middleware'=> ['auth','checkRole:admin,karyawan'] ],function(){
Route::get('/absen','AbsenController@index');
Route::post('/absen','Absencontroller@store');
Route::patch('/absen/update','Absencontroller@update');
Route::get('/calendar','calendar@index');
Route::get('/artikel','artikelcontrol@index');
Route::get('/kontak','kontakcontroller@index');
Route::get('/maps','absencontroller@maps');


});

Route::get('/logout', 'HomeController@keluar');

