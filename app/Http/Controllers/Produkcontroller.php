<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\Tentang;
use Session;

class Produkcontroller extends Controller
{
    //
    public function index()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $produkviewasc = Product::orderBy('nama_produk', 'ASC')->get();
        $produkviewdesc = Product::orderBy('nama_produk', 'DESC')->get();

        $produkviewhargaasc = Product::orderBy('harga', 'ASC')->get();
        $produkviewhargadesc = Product::orderBy('harga', 'DESC')->get();

        $produkviewterlarisasc = Product::orderBy('terjual', 'ASC')->get();
        $produkviewterlarisdesc = Product::orderBy('terjual', 'DESC')->get();

        $tentang = Tentang::all();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'produkdataasc' => $produkviewasc,
            'produkdatadesc' => $produkviewdesc,

            'produkviewhargaasc' => $produkviewhargaasc,
            'produkviewhargadesc' => $produkviewhargadesc,

            'produkviewterlarisasc' => $produkviewterlarisasc,
            'produkviewterlarisdesc' => $produkviewterlarisdesc,
            'tentang' => $tentang
        ]; 

        return view('produk')->with($data);
    }
    public function filter(Request $request)
    {   
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        $filter = 1;
        $userview = User::where('id', Session('loginid'))->get();
        $produkviewasc = Product::where('id_kategori', $request->filter)->orderBy('nama_produk', 'ASC')->get();
        $produkviewdesc = Product::where('id_kategori', $request->filter)->orderBy('nama_produk', 'DESC')->get();

        $produkviewhargaasc = Product::where('id_kategori', $request->filter)->orderBy('harga', 'ASC')->get();
        $produkviewhargadesc = Product::where('id_kategori', $request->filter)->orderBy('harga', 'DESC')->get();

        $produkviewterlarisasc = Product::where('id_kategori', $request->filter)->orderBy('terjual', 'ASC')->get();
        $produkviewterlarisdesc = Product::where('id_kategori', $request->filter)->orderBy('terjual', 'DESC')->get();

        $kategoriview = Kategori::where('id_kategori', $request->filter)->get();
        $tentang = Tentang::all();
        $data = [
            'sessionget' => Session::has('loginid'),
            'filterproduk' => 1,
            'userdata' => $userview,
            'kategoridata' => $kategoriview,

            'produkdataasc' => $produkviewasc,
            'produkdatadesc' => $produkviewdesc,

            'produkviewhargaasc' => $produkviewhargaasc,
            'produkviewhargadesc' => $produkviewhargadesc,

            'produkviewterlarisasc' => $produkviewterlarisasc,
            'produkviewterlarisdesc' => $produkviewterlarisdesc,
            'tentang' => $tentang
        ];
        // print_r($request->filter);
        return view('produk')->with($data);
    }
    public function show(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $produk = Product::where('id_produk', $request->show)->get();
        $tentang = Tentang::all();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'produk' => $produk,
            'tentang' => $tentang
        ];
        return view('showproduk')->with($data);
    }
    public function keranjang()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }   
        $userview = User::where('id', Session('loginid'))->get();
        $keranjang = Keranjang::where('id_user', Session('loginid'))->where('status', 1)->orderBy('id_keranjang', 'DESC')->get();
        $tentang = Tentang::all();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'keranjangdata' => $keranjang,
            'tentang' => $tentang
        ];
        return view('keranjang')->with($data);
    }
    public function storekeranjang(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }   
        $keranjang = new keranjang;
        $keranjang->id_produk = $request->id_produk;
        $keranjang->id_user = Session('loginid');
        $keranjang->jumlah = $request->total;
        $keranjang->status = 1;

        $keranjang->save();
        return back();
    }
    public function viewkeranjang(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }   
        $userview = User::where('id', Session('loginid'))->get();
        $keranjang = Keranjang::where('id_keranjang', $request->id)->get();
        $tentang = Tentang::all();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'keranjangdata' => $keranjang,
            'tentang' => $tentang
        ];
        return view('viewkeranjang')->with($data);
    }
    public function Checkoutkeranjang(Request $request)
    {
        $data = [
            'status' => 2,
            'harga' => $request->harga,
            'nama_pemesan' => $request->nama,
            'alamat' => $request->alamat
        ];
        Keranjang::where('id_keranjang', $request->id_keranjang)->update($data);
        // print_r($data);
        return redirect('/riwayat');
    }
    public function deletekeranjang(Request $request)
    {
        Keranjang::where('id_keranjang', $request->id)->delete();
        // print_r($data);
        return redirect('/keranjang');
    }
    public function riwayat()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }   
        $userview = User::where('id', Session('loginid'))->get();
        $keranjang = Keranjang::where('id_user', Session('loginid'))->where('status', 2)->orderBy('id_keranjang', 'DESC')->get();
        $keranjangdikemas = Keranjang::where('id_user', Session('loginid'))->where('status', 3)->orderBy('id_keranjang', 'DESC')->get();
        $keranjangdiproses = Keranjang::where('id_user', Session('loginid'))->where('status', 4)->orderBy('id_keranjang', 'DESC')->get();
        $keranjangselesai = Keranjang::where('id_user', Session('loginid'))->where('status', 5)->orderBy('id_keranjang', 'DESC')->get();
        $keranjangbatal = Keranjang::where('id_user', Session('loginid'))->where('status', 6)->orderBy('id_keranjang', 'DESC')->get();
        $tentang = Tentang::all();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'keranjangdata' => $keranjang,
            'dikemas' => $keranjangdikemas,
            'diproses' => $keranjangdiproses,
            'selesai' => $keranjangselesai,
            'batal' => $keranjangbatal,
            'tentang' => $tentang
        ];
        return view('riwayat')->with($data);
    }
    public function terimakeranjang(Request $request)
    {
        $data = [
            'status' => 5
        ];
        Keranjang::where('id_keranjang', $request->id)->update($data);
        // print_r($data);
        return redirect('/riwayat');
    }
    public function likekeranjang(Request $request)
    {

        $produkviewasc = Product::where('id_produk', $request->id_keranjang)->get();
        foreach ($produkviewasc as $key => $value) {
            // code...
            $data = [
                'suka' => $value->suka + 1
            ];
            Product::where('id_produk', $request->id_produk)->update($data);
        }
        $data2 = [
            'penilaian' => 1
        ];
        Keranjang::where('id_keranjang', $request->id_keranjang)->update($data2);
        return redirect('/riwayat');
    }
    public function dislikekeranjang(Request $request)
    {

        $produkviewasc = Product::where('id_produk', $request->id_keranjang)->get();
        foreach ($produkviewasc as $key => $value) {
            // code...
            $data = [
                'suka' => $value->tidaksuka + 1
            ];
            Product::where('id_produk', $request->id_produk)->update($data);
        }
        $data2 = [
            'penilaian' => 1
        ];
        Keranjang::where('id_keranjang', $request->id_keranjang)->update($data2);
        return redirect('/riwayat');
    }
    public function bayarkeranjang(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }   
        $metode = Pembayaran::orderBy('id', 'DESC')->get();
        $userview = User::where('id', Session('loginid'))->get();
        $keranjang = Keranjang::where('id_keranjang', $request->id)->get();
        $tentang = Tentang::all();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'keranjangdata' => $keranjang,
            'metode' => $metode,
            'tentang' => $tentang
        ];
        return view('methodpembayaran')->with($data);
    }
    public function bayarkeranjangpost(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        $tujuan_upload = 'mystyle/image/bukti/';
        $file = $request->file('icon');
        $namafile = time().'_'.$file->getClientOriginalName();
        $file->move($tujuan_upload,$namafile);

        $data = [
            'bukti_pembayaran' => $namafile
        ];
        Keranjang::where('id_keranjang', $request->id_keranjang)->update($data);
        
        return redirect('/riwayat');
        
    }
    public function search(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $produkviewasc = Product::where('nama_produk', 'LIKE', '%'.$request->search.'%')->orderBy('nama_produk', 'ASC')->get();
        $produkviewdesc = Product::where('nama_produk', 'LIKE', '%'.$request->search.'%')->orderBy('nama_produk', 'DESC')->get();

        $produkviewhargaasc = Product::where('nama_produk', 'LIKE', '%'.$request->search.'%')->orderBy('harga', 'ASC')->get();
        $produkviewhargadesc = Product::where('nama_produk', 'LIKE', '%'.$request->search.'%')->orderBy('harga', 'DESC')->get();

        $produkviewterlarisasc = Product::where('nama_produk', 'LIKE', '%'.$request->search.'%')->orderBy('terjual', 'ASC')->get();
        $produkviewterlarisdesc = Product::where('nama_produk', 'LIKE', '%'.$request->search.'%')->orderBy('terjual', 'DESC')->get();

        $produkviewall = Product::where('nama_produk', 'LIKE', '%'.$request->search.'%')->count();
        $tentang = Tentang::all();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'produkviewall' => $produkviewall,

            'produkdataasc' => $produkviewasc,
            'produkdatadesc' => $produkviewdesc,

            'produkviewhargaasc' => $produkviewhargaasc,
            'produkviewhargadesc' => $produkviewhargadesc,

            'produkviewterlarisasc' => $produkviewterlarisasc,
            'produkviewterlarisdesc' => $produkviewterlarisdesc,
            'tentang' => $tentang
        ]; 

        return view('searchproduk')->with($data);
    }
}
