<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "siswa";
    protected $primaryKey = "nis";
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'no_hp',
        'password',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
