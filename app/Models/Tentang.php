<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $fillable = [
            'logo',
            'nama',
            'whatsapp',
            'facebook',
            'youtube'
        ];
}
