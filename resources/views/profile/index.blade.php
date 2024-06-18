@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container">
    <div class="profile-header">
        <h1>Profil Pengguna</h1>
    </div>
    <div class="profile-container">
        <div class="profile-info">
            <p><strong>Nama:</strong> {{ $pengguna->name }}</p>
            <p><strong>Email:</strong> {{ $pengguna->email }}</p>
            <p><strong>Tanggal Bergabung:</strong> {{ $pengguna->created_at->format('d M Y') }}</p>
        </div>
        <div class="profile-actions">
            <a href="{{ route('profile.change-password-form') }}" class="btn btn-secondary"  onclick="return confirm('Apakah Anda yakin ingin menggubah password anda?')">Ubah Password</a>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .profile-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .profile-header h1 {
        font-size: 2.5em;
        color: #333;
    }
    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .profile-info {
        width: 100%;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .profile-info p {
        font-size: 18px;
        margin: 10px 0;
        color: #555;
    }
    .profile-info strong {
        color: #333;
        font-weight: bold;
    }
    .profile-actions {
        padding-top: 20px;
        text-align: center;
    }
    .profile-actions .btn {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    .profile-actions .btn:hover {
        background-color: #0056b3;
    }
</style>
@endsection
