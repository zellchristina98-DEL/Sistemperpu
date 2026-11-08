<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;

Route::get('/', 'App\Http\Controllers\login@index');
Route::post('/login', 'App\Http\Controllers\login@aksilogin');
Route::get('/logout', 'App\Http\Controllers\login@aksilogout');
Route::get('/register', 'App\Http\Controllers\login@inputdata');

Route::get('/homeSiswa', 'App\Http\Controllers\login@siswa');
Route::get('/inputsiswa', 'App\Http\Controllers\login@inputsiswa');
Route::post('/swa', 'App\Http\Controllers\login@aksiinputsiswa');

Route::get('/homeKaryawans', 'App\Http\Controllers\login@karyawan');
Route::get('/inputkry', 'App\Http\Controllers\login@inputkry');
Route::post('/krywn', 'App\Http\Controllers\login@aksiinputkry');
Route::get('/editkaryawan/{IDPetugas}', 'App\Http\Controllers\login@editkaryawan');
Route::put('/editkaryawan/{IDPetugas}', 'App\Http\Controllers\login@updatekaryawan');
Route::delete('/deletekaryawan/{IDPetugas}', 'App\Http\Controllers\login@deletekaryawan');

Route::get('/homebuku', 'App\Http\Controllers\login@buku');
Route::get('/inputbuku', 'App\Http\Controllers\login@inputbuku');
Route::post('/BUKU', 'App\Http\Controllers\login@aksibuku');
Route::get('/editbuku/{buku}', 'App\Http\Controllers\login@editbuku');
Route::put('/editbuku/{buku}', 'App\Http\Controllers\login@updatebuku');
Route::delete('/delete/{buku}', 'App\Http\Controllers\login@deletebuku');

Route::get('/homepeminjaman', 'App\Http\Controllers\login@peminjaman');
Route::get('/inputpeminjaman', 'App\Http\Controllers\login@inputpeminjaman');
Route::post('/peminjaman', 'App\Http\Controllers\login@aksipeminjaman');
Route::get('/editpeminjaman/{IDPeminjaman}', 'App\Http\Controllers\login@editpeminjaman');
Route::put('/editpeminjaman/{IDPeminjaman}', 'App\Http\Controllers\login@updatepeminjaman');
Route::delete('/deletepeminjaman/{IDPeminjaman}', 'App\Http\Controllers\login@deletepeminjaman');

Route::get('/homedetail/{id}', 'App\Http\Controllers\login@detail');
Route::get('/inputdatadetail', 'App\Http\Controllers\login@aksidetail');

Route::get('/homedenda', 'App\Http\Controllers\login@denda');
Route::get('/inputdenda', 'App\Http\Controllers\login@inputdenda');
Route::post('/aksidenda', 'App\Http\Controllers\login@aksidenda');
Route::get('/editdenda/{id}', 'App\Http\Controllers\login@editdenda');
Route::post('/updatedenda/{id}', 'App\Http\Controllers\login@updatedenda');

Route::get('/homepengembalian', 'App\Http\Controllers\login@pengembalian');
Route::get('/inputpengembalian', 'App\Http\Controllers\login@inputpengembalian');
Route::post('/simpanpengembalian', 'App\Http\Controllers\login@aksipengembalian');
Route::get('/edit-pengembalian/{id}', 'App\Http\Controllers\login@editpengembalian');
Route::post('/aksieditpengembalian/{id}', 'App\Http\Controllers\login@aksieditpengembalian');
Route::delete('/deletepengembalian/{id}', 'App\Http\Controllers\login@deletepengembalian');
