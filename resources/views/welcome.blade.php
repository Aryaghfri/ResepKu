@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Selamat Datang di Sistem Pengelolaan Resep Masakan</h1>
    <p>Kelola resep masakan Anda dengan mudah dan cepat.</p>
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
</div>
@endsection
