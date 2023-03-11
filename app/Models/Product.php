<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primarykey = 'id_produk';
    protected $fillable = [
            'featured_image',
            'nama_produk',
            'harga',
            'diskon',
            'spesifikasi',
            'deskrpisi',
            'kuantitas'
        ];
}
