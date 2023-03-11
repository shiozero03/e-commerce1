<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tentang;
use Session;

class Tentangcontroller extends Controller
{
    //
    public function update(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => 'Anda belum login']);
        }
        if(Session::get('isadmin') == 1){
            return redirect('/')->with(['admin' => 'Anda bukan admin']);
        }
        $file = $request->file('icon');
        $tujuan_upload = 'mystyle/image/';

        if($file == '' || $file == null){
            $data = [
                'nama' => $request->nama,
                'whatsapp' => $request->whatsapp,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube
            ];
        } else{
            $namafile = time().'_'.$file->getClientOriginalName();
            $file->move($tujuan_upload,$namafile);

            $data = [
                'logo' => $namafile,
                'nama' => $request->nama,
                'whatsapp' => $request->whatsapp,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube
            ];
        }
        Tentang::where('id', 1)->update($data);
        // print_r($data);
        return back()->with(['success', 'Data berhasil diupdate']);
    }
}
