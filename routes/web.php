<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;

Route::get('/','App\Http\Controllers\login@index');
Route::post('/login','App\Http\Controllers\login@aksilogin');