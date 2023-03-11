<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'username',
        'email',
        'handphone',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
