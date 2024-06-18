@extends('layouts.app')

@section('title', 'Ubah Password')

@section('content')
<div class="container">
    <h1>Ubah Password</h1>
    <form action="{{ route('profile.change-password') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="current_password">Password Saat Ini</label>
            <input type="password" name="current_password" class="form-control" required>
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="new_password">Password Baru</label>
            <input type="password" name="new_password" class="form-control" required>
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Password Anda telah di ubah')">Ubah Password</button>
    </form>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }
</style>
@endsection
