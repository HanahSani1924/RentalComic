<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

//Route untuk data Buku
Route::get('/buku', 'BukuController@bukutampil');
Route::post('/buku/tambah', 'BukuController@bukutambah');
Route::get('/buku/hapus/{id_buku}', 'BukuController@bukuhapus');
Route::put('/buku/edit/{id_buku}', 'BukuController@bukuedit');

//Route unutk data Buku
Route::get('/home',function(){return view('view_home');});

//Route untuk data Anggota
Route::get('/anggota', 'AnggotaController@anggotatampil');
Route::post('/anggota/tambah', 'AnggotaController@anggotatambah');
Route::get('/anggota/hapus/{id_anggota}', 'AnggotaController@anggotahapus');
Route::put('/anggota/edit/{id_anggota}', 'AnggotaController@anggotaedit');

//Route untuk data Petugas
Route::get('/petugas', 'PetugasController@petugastampil');
Route::post('/petugas/tambah', 'PetugasController@petugastambah');
Route::get('/petugas/hapus/{id_petugas}', 'PetugasController@petugashapus');
Route::put('/petugas/edit/{id_petugas}', 'PetugasController@petugasedit');

//Route untuk data Sewa
Route::get('/sewa', 'SewaController@sewatampil');
Route::post('/sewa/tambah', 'SewaController@sewatambah');
Route::get('/sewa/hapus/{id_sewa}', 'SewaController@sewahapus');
Route::put('/sewa/edit/{id_sewa}', 'SewaController@sewaedit');
