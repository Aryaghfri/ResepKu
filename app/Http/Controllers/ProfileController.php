<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $pengguna = Auth::user();
        return view('profile.index', compact('pengguna'));
    }

    public function showChangePasswordForm()
    {
        return view('profile.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $pengguna = Auth::user();

        if (!Hash::check($request->current_password, $pengguna->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah']);
        }

        $pengguna->password = Hash::make($request->new_password);
        return redirect()->route('profile.index')->with('success', 'Password berhasil diubah');
    }
}
