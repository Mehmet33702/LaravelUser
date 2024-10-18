@extends('layouts.master')
@section('content')

    @if (session()->get('error'))
        <span class="bg-danger">{{ session()->get('error') }}</span>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-5">Giriş Yap</h2>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-posta: </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-posta adresinizi giriniz">
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre: </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Şifrenizi giriniz">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
