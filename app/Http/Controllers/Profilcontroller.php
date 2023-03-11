<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Kategori;
use App\Models\Tentang;
use Session;

class Profilcontroller extends Controller
{
    public function index()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => ' Email atau Password Salah']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $bannerview = Banner::all();
        $kategoriview = Kategori::all();
        $tentang = Tentang::all();
        $data = [
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'bannerdata' => $bannerview,
            'kategoridata' => $kategoriview,
            'tentang' => $tentang
        ]; 

        return view('profil')->with($data);
    }
    public function viewprofil()
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => ' Email atau Password Salah']);
        }
        $userview = User::where('id', Session('loginid'))->get();
        $bannerview = Banner::all();
        $kategoriview = Kategori::all();
        $tentang = Tentang::all();
        $data = [
            'sessionget' => Session::has('loginid'),
            'userdata' => $userview,
            'bannerdata' => $bannerview,
            'kategoridata' => $kategoriview,
            'tentang' => $tentang
        ]; 

        return view('profilview')->with($data);
    }
    public function updateprofil(Request $request)
    {
        if(!Session::has('loginid')){
            return redirect('/masuk')->with(['info' => ' Email atau Password Salah']);
        }
        $tujuan_upload = 'mystyle/image/profil/';
        $file = $request->file('icon');
        $namafile = time().'_'.$file->getClientOriginalName();
        $file->move($tujuan_upload,$namafile);

        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'handphone' => $request->handphone,
            'image' => $namafile
        ];
        User::where('id', $request->type)->update($data);
        
        return back();
    }
}
