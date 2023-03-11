<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Session;

class Pembayarancontrol extends Controller
{
    //
    public function store(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $bayar = new Pembayaran;
        $bayar->jenis = $request->jenis;
        $bayar->nomor = $request->nomor;
        $bayar->atasnama = $request->atasnama;

        $bayar->save();
        return back()->with(['success' => 'Data berhasil ditambahkan']);
    }
    public function delete(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $id = $request->id;
        $bayar = Pembayaran::find($id);
        $bayar->delete();
        
        return back()->with(['error' => 'Data berhasil dihapus']);
    }
}
