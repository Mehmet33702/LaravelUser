<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController; //Üye Kayıt ve Giriş
use App\Http\Controllers\ForgotPasswordController; //Şifre Sıfırlama

Route::get('/', function () {
    return view('uye.giris');
});

//Üye Kayıt ve Login işlemleri
Route::get('register', [CustomAuthController::class,'create']);
Route::post('register', [CustomAuthController::class,'store']);

Route::get('/profil', [CustomAuthController::class,'index']);

Route::get('/login', [CustomAuthController::class,'login']);
Route::post('/login', [CustomAuthController::class,'login']);

Route::get('/logout', [CustomAuthController::class,'logout']);


//Şifremi Unuttum ve Sıfırla
route::get('/forgot-password', [ForgotPasswordController::class, 'showLingRequestFrom'])->name('password.request');
route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetFrom'])->name('password.reset');
route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');




