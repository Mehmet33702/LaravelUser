@extends('layouts.master')
@section('content')
    <h2>Şifremi Unuttum</h2>
    @if (@session()->get('success'))
        <span>{{ session()->get('success') }}</span>
    @endif

    @if ($errors)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <input type="email" name="email" id="email" required>
            <button type="submit">Şifre Sıfırla Bağlantısı Gönder</button>
        </form>
@endsection




