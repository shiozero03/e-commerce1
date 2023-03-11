<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\Tentang;
use Session;

class Admincontrol extends Controller
{
    //
    public function dashboard()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $bannerview = Banner::orderBy('id', 'DESC')->get();
        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'bannerdata' => $bannerview
        ];
        return view('admin.dashboard')->with($data);
    }
    public function home()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $bannerview = Banner::where('type', 'banner')->orderBy('id', 'DESC')->get();
        $flashsale = Banner::where('type', 'flashsale')->orderBy('id', 'DESC')->get();
        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'bannerdata' => $bannerview,
            'flashsale' => $flashsale
        ];
        return view('admin.home')->with($data);
    }
    public function produk()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $kategoriview = Kategori::orderBy('id_kategori', 'DESC')->get();
        $produk = Product::orderBy('id_produk', 'DESC')->get();
        $userview = User::where('id', Session('loginid'))->get();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'kategoriview' => $kategoriview,
            'produk' => $produk
        ];
        return view('admin.produk')->with($data);
    }
    public function checkout()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $belumbayar = Keranjang::where('status', 2)->orderBy('id_keranjang', 'DESC')->get();
        $dikemas = Keranjang::where('status', 3)->orderBy('id_keranjang', 'DESC')->get();
        $proses = Keranjang::where('status', 4)->orderBy('id_keranjang', 'DESC')->get();
        $selesai = Keranjang::where('status', 5)->orderBy('id_keranjang', 'DESC')->get();
        $batal = Keranjang::where('status', 6)->orderBy('id_keranjang', 'DESC')->get();
        $userview = User::where('id', Session('loginid'))->get();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'belumbayar' => $belumbayar,
            'dikemas' => $dikemas,
            'proses' => $proses,
            'selesai' => $selesai,
            'batal' => $batal
        ];
        return view('admin.kelolacheckout')->with($data);
    }
    public function user()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $userget = User::where('id', '!=', Session('loginid'))->orderBy('id', 'DESC')->get();
        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'userget' => $userget
        ];
        return view('admin.user')->with($data);
    }
    public function tentang()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $tentang = Tentang::orderBy('id', 'DESC')->get();
        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'tentang' => $tentang
        ];
        return view('admin.tentang')->with($data);
    }
    public function pembayaran()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $pembayaran = Pembayaran::orderBy('id', 'DESC')->get();
        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'pembayaran' => $pembayaran
        ];
        return view('admin.pembayaran')->with($data);
    }
}
