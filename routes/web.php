<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;


Route::get('/', function () {
    return view('uye.giris');
});

Route::get('register', [CustomAuthController::class,'create']);
Route::post('register', [CustomAuthController::class,'store']);

Route::get('/profil', [CustomAuthController::class,'index']);

Route::get('/login', [CustomAuthController::class,'login']);
Route::post('/login', [CustomAuthController::class,'login']);

Route::get('/logout', [CustomAuthController::class,'logout']);

