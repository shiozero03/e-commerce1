<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Product;
use Session;
use DB;

class Produkcontrolleradmin extends Controller
{
    //
    public function storekategori(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        
        $tujuan_upload = 'mystyle/image/';
        $file = $request->file('icon');
        $namafile = time().'_'.$file->getClientOriginalName();
        $file->move($tujuan_upload,$namafile);

        print_r($namafile);

        $kategori = new Kategori;
        $kategori->icon = $namafile;
        $kategori->judul = $request->judul;
        $kategori->created_at = date('Y-m-d H:i:s');
        $kategori->save();
        return back()->with(['success' => 'Data berhasil ditambahkan']);


    }
    public function deletekategori(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $id = $request->id;
        Product::where('id_kategori', $id)->delete();
        Kategori::where('id_kategori', $id)->delete();
        
        return back()->with(['error' => 'Data berhasil dihapus']);
    }
    public function storeproduk(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $tujuan_upload = 'mystyle/image/';
        $file = $request->file('icon');
        $namafile = time().'_'.$file->getClientOriginalName();
        $file->move($tujuan_upload,$namafile);
        $produk = new Product;
        $produk->featured_image = $namafile;
        $produk->id_kategori = $request->kategori;
        $produk->kuantitas = $request->kuantitas;
        $produk->nama_produk = $request->nama;
        $produk->harga = $request->harga;
        $produk->spesifikasi = $request->spesifikasi;
        $produk->deskripsi = $request->deskripsi;
        
        $produk->save();
        return back()->with(['success' => 'Data berhasil ditambahkan']);

    }
    public function viewproduk(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $produk = Product::where('id_produk', $request->id)->get();
        $userview = User::where('id', Session('loginid'))->get();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'produk' => $produk
        ];
        return view('admin.viewproduk')->with($data);
    }
    public function editproduk(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $produk = Product::where('id_produk', $request->id)->get();
        $userview = User::where('id', Session('loginid'))->get();

        $data = [
            'filterproduk' => 0,
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'produk' => $produk
        ];
        return view('admin.editproduk')->with($data);
    }
    public function updateproduk(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $tujuan_upload = 'mystyle/image/';
        $file = $request->file('icon');

        if($file == null || $file == ''){
            $data = [
                'kuantitas' => $request->kuantitas,
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'spesifikasi' => $request->spesifikasi,
                'deskripsi' => $request->deskripsi
            ];
        } else {
            $namafile = time().'_'.$file->getClientOriginalName();
            $file->move($tujuan_upload,$namafile);
            $data = [
                'featured_image' => $namafile,
                'kuantitas' => $request->kuantitas,
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'spesifikasi' => $request->spesifikasi,
                'deskripsi' => $request->deskripsi
            ];
        }
        $pro = DB::table('products')->where('id_produk', $request->id_produk)->update($data);
        // $pro = Product::where('id_produk', $request->id_produk)->update($data);
        print_r($pro);
        return redirect('/admin/produk')->with(['info' => 'Data berhasil ditambahkan']);

    }
    public function deleteproduk(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $id = $request->id;
        Product::where('id_produk', $id)->delete();
        
        return back()->with(['error' => 'Data berhasil dihapus']);
    }
}
