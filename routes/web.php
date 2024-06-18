<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ResepController::class, 'index'])->name('dashboard');
    Route::resource('reseps', ResepController::class);
    Route::get('/favorit', [FavoritController::class, 'index'])->name('favorit.index');
    Route::post('reseps/{resep}/favorit', [FavoritController::class, 'store'])->name('favorit.store');
    Route::delete('reseps/{resep}/favorit', [FavoritController::class, 'destroy'])->name('favorit.destroy');
    Route::get('/reseps/{resep}', [ResepController::class, 'show'])->name('reseps.show');
    Route::post('/reseps', [ResepController::class, 'store'])->name('reseps.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('profile.change-password-form');
Route::post('profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/reseps/{resep}/favorite', [ResepController::class, 'favorite'])->name('reseps.favorite');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
