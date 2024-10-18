<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Password; //Tanımlama

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm(){
        return view('uye.email');
    }

    public function sendResetLinkEmail(Request $request){
        $request->validate(['email' =>'required|email']);

        //laravel şifre token oluşturuyor
        $status=Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->withSuccess(__($status))
            : back()->withError(['email'=>__($status)]);
    }




}
