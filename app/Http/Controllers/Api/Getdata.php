<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\Tentang;

class Getdata extends Controller
{
    //
    public function userget()
    {
        $user = User::latest()->get();
        return response([
            'success' => true,
            'message' => 'User List',
            'data' => $user
        ], 200);
    }
    public function tentangget()
    {
        $tentang = Tentang::latest()->get();
        return response([
            'success' => true,
            'message' => 'Tentang List',
            'data' => $tentang
        ], 200);
    }
}
