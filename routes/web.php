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
    return view('/index');
});
Route::get('/index','PageController@index')->name('index');

//kelas
Route::get('/kelas', 'KelasController@index');
Route::get('/kelas/create', 'KelasController@create');
Route::get('/kelas/{kelas}', 'KelasController@show')->name('kelas.show');
Route::post('/kelas', 'KelasController@store');
Route::delete('/kelas/{kelas}', 'KelasController@destroy');
Route::get('/kelas/{kelas}/edit', 'KelasController@edit');
Route::patch('/kelas/{kelas}', 'KelasController@update');
//siswa
Route::get('/kelas/siswa/create/{kelas}', 'SiswaController@create');
Route::post('/siswa/store', 'SiswaController@store')->name('siswa.store');
Route::get('/kelas/siswa/{siswa}/edit', 'SiswaController@edit')->name('siswa.edit');
Route::patch('/kelas/siswa/{siswa}/update', 'SiswaController@update')->name('siswa.update');
Route::delete('/kelas/siswa/{siswa}', 'SiswaController@destroy')->name('siswa.delete');
//absensi
Route::get('/absensi', 'AbsensiController@index')->name('absensi.siswa');
Route::get('/absensi/{kelas}', 'AbsensiController@show')->name('absensi.show');
Route::post('/absensi/store', 'AbsensiController@store')->name('absensi.store');
Route::get('/absensi/{kelas}/edit', 'AbsensiController@edit')->name('absensi.edit');
Route::patch('/absensi', 'AbsensiController@update')->name('absensi.update');
//rekap
Route::get('/rekap', 'RekapController@index')->name('rekap.absensi');
Route::get('/rekap/show/{kelas_id}', 'RekapController@show')->name('rekap.show');
Route::get('/rekap/export/{kelas_id}', 'RekapController@export')->name('rekap.excel');
Route::get('/rekap/show/exportpdf/{kelas_id}', 'RekapController@showpdf')->name('showrekap.pdf');

