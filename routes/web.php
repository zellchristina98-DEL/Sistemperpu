<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;

Route::get('/','App\Http\Controllers\login@index');
Route::post('/login','App\Http\Controllers\login@aksilogin');
Route::get('/logout','App\Http\Controllers\login@aksilogout');

Route::get('/homePetugas','App\Http\Controllers\login@petugas');
Route::get('/homeSiswa','App\Http\Controllers\login@siswa');
Route::get('/register','App\Http\Controllers\login@inputdata');

Route::get('/inputsiswa','App\Http\Controllers\login@inputsiswa');
Route::post('/swa','App\Http\Controllers\login@aksiinputsiswa');

Route::get('/inputPetugas','App\Http\Controllers\login@inputpetugas');
Route::post('/ptgs','App\Http\Controllers\login@aksiinputpetugas');

Route::get('/homePetugas','App\Http\Controllers\login@homepetugas');
Route::get('/homeSiswa','App\Http\Controllers\login@homesiswa');