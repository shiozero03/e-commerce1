<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Session;

class Homeadmincontroller extends Controller
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

        $tujuan_upload = 'mystyle/image/banner/';
        $file = $request->file('imagebanner');
        $namafile = time().'_'.$file->getClientOriginalName();
        $file->move($tujuan_upload,$namafile);

        print_r($namafile);

        $banner = new Banner;
        $banner->imagebanner = $namafile;
        $banner->type = $request->type;
        $banner->save();
        return back()->with(['success' => 'Data berhasil ditambahkan']);
    }
    public function deletedata(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $id = $request->id;
        $banner = Banner::find($id);
        $banner->delete();
        
        return back()->with(['error' => 'Data berhasil dihapus']);
    }
}
