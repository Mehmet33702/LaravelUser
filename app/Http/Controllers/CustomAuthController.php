<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Sonradan Tanımlamalar
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{
    public function create(){
        return view("uye.kayit");
    }

    public function store(Request $request){
        //Validate; Girilen verilerin dolu boş sayı yazı gibi kontroller yapılıyor
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed' //confirmed şifre tekrar doğrulama
        ],[
            //hataları kendimeize göre düzneliyoruz
            'name.required' => 'Ad Boş geçilemez.',
            'email.required' => 'e-Posta Boş geçilemez.',
            'password.required' => 'Şifre Boş geçilemez.',
        ]);
        $user = User::create($request->only(['name','email','password']));
        Auth::login($user);
        return redirect()->to('/profil');
    }

    public function index(Request $request){
        if (Auth::check()){
            //giriş yapıldığında gösterir sayfa yenilendiğinde göstermez
            echo session()->get('success');
            return Auth::user();
        }else{
            return redirect()->to('/login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->to('login')
            ->withSuccess('Başarıyla Çıkış Yapıldı.');
    }

    public function login(Request $request){
        if($request->method() == 'POST'){
                $credentiels=$request->validate([
                    'email' => 'required|email',
                    'password'=> 'required'
                ]);
                if (Auth::attempt($credentiels)){
                    return redirect()->to('/profil')
                        ->withSuccess('Giriş Başarıyla Yapıldı.');
                }

                return back()->withError('Kullanıcı Adı veya Şifre Yanlış.');
        }
        return view('uye.giris');
    }
}
