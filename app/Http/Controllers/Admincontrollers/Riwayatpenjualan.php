<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Keranjang;
use Session;

class Riwayatpenjualan extends Controller
{
    //
    public function index()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $selesai = Keranjang::where('status', 5)->orderBy('id_keranjang', 'DESC')->get();
        $userview = User::where('id', Session('loginid'))->get();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'selesai' => $selesai
        ];
        return view('admin.riwayatpenjualan')->with($data);
    }
    public function batalkan(Request $request)
    {
        $data = [
            'status' => 6,
            'alasan' => 'Data pembayaran tidak valid'
        ];
        Keranjang::where('id_keranjang', $request->id)->update($data);
        // print_r($data);
        return back()->with(['error' => 'Data ditolak']);
    }
    public function terima(Request $request)
    {
        $produkviewasc = Product::where('id_produk', $request->id_keranjang)->get();
        foreach ($produkviewasc as $key => $value) {
            // code...
            $data = [
                'terjual' => $value->terjual + 1,
                'kuantitas' => $value->kuantitas - 1
            ];
            Product::where('id_produk', $request->id_produk)->update($data);
        }
        $data = [
            'status' => 3
        ];

        Keranjang::where('id_keranjang', $request->id_keranjang)->update($data);
        // print_r($data);
        return back()->with(['success' => 'Data ditolak']);
    }
    public function kemas(Request $request)
    {
        $data = [
            'status' => 4
        ];
        Keranjang::where('id_keranjang', $request->id)->update($data);
        // print_r($data);
        return back()->with(['info' => 'Data ditolak']);
    }
}
