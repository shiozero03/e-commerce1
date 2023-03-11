<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Tentang;
use Session;

class Homecontroller extends Controller
{
    //
    public function index()
    {
        $userview = User::where('id', Session('loginid'))->get();
        $produkview = Product::limit(6)->orderBy('id_produk', 'DESC')->get();
        $bannerview = Banner::where('type', 'banner')->orderBy('id', 'DESC')->get();
        $flashsale = Banner::limit(4)->where('type', 'flashsale')->orderBy('id', 'DESC')->get();
        $kategoriview = Kategori::orderBy('id_kategori', 'DESC')->get();
        $flashview = Product::where('diskon', '>', 0)->get();
        $terlaris = Product::limit(6)->orderBy('terjual', 'DESC')->get();
        $favorite = Product::limit(6)->orderBy('suka', 'DESC')->get();
        $tentang = Tentang::all();
        $data = [
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'bannerdata' => $bannerview,
            'flashdata' => $flashview,
            'kategoridata' => $kategoriview,
            'produkdata' => $produkview,
            'flashsale' => $flashsale,
            'terlaris' => $terlaris,
            'favorite' => $favorite,
            'tentang' => $tentang
        ];
        // print_r($flashview);
        return view('home')->with($data);
    }
    public function bantuan()
    {
        $userview = User::where('id', Session('loginid'))->get();
        $tentang = Tentang::all();
        $data = [
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'tentang' => $tentang
        ]; 
        return view('bantuan')->with($data);
    }
}
