<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;

Route::get('/', 'App\Http\Controllers\login@index');
Route::post('/login', 'App\Http\Controllers\login@aksilogin');
Route::get('/logout', 'App\Http\Controllers\login@aksilogout');

Route::get('/homeKaryawans', 'App\Http\Controllers\login@karyawan');
Route::get('/homeSiswa', 'App\Http\Controllers\login@siswa');
Route::get('/register', 'App\Http\Controllers\login@inputdata');

Route::get('/inputsiswa', 'App\Http\Controllers\login@inputsiswa');
Route::post('/swa', 'App\Http\Controllers\login@aksiinputsiswa');

Route::get('/inputkry', 'App\Http\Controllers\login@inputkry');
Route::post('/krywn', 'App\Http\Controllers\login@aksiinputkry');

Route::get('/homebuku', 'App\Http\Controllers\login@buku');
Route::get('/inputbuku', 'App\Http\Controllers\login@inputbuku');
Route::post('/BUKU', 'App\Http\Controllers\login@aksibuku');