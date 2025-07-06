<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // <-- Gunakan ini
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable // <-- Extends ke Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Tentukan guard khusus untuk model Admin.
     * @var string
     */
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nip',
        'password',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed', // Otomatis hash password saat dibuat/diupdate
    ];
}