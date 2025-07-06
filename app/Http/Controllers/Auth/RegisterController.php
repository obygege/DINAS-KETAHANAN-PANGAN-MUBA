<?php

// File: app/Http/Controllers/Auth/RegisterController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16|unique:users,nik',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'avatar' => null,
        ]);

        return redirect()->route('login.form')
                         ->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}   