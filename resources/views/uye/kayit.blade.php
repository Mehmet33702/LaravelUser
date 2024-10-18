@extends('layouts.master')
@section('content')

<div class="container mt-5">
    <h2>Kayıt Formu</h2>
<!--Kayıt Hataların Kontrolleri-->
    @if ($errors)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/register" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Ad Soyad:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Adınızı girin">
        </div>
        <div class="form-group">
            <label for="email">Email Adresi:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email adresinizi girin">
        </div>
        <div class="form-group">
            <label for="password">Şifre:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Şifrenizi girin">
        </div>
        <div class="form-group">
            <label for="password">Şifre Tekrar:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Şifrenizi girin">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" style="cursor:pointer" class="btn btn-primary">Kayıt Ol</button>
        </div>
    </form>
</div>
@endsection


