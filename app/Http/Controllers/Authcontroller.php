<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Session;

class Authcontroller extends Controller
{
    //
    public function login()
    {
        if(Session::has('loginid')){
            return redirect('/');
        }
        $tentang = Tentang::all();
        $data = [
            'sessionget' => Session::has('loginid'),
            'tentang' => $tentang
        ]; 
        return view('login')->with($data);
    }
    public function proses_login(Request $request)
    {
        if(Session::has('loginid')){
            return redirect('/');
        }
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
              $request->session()->put('loginid', $user->id);
              $request->session()->put('isadmin', $user->is_admin);
              if($user->is_admin == 1){
                return redirect('/')->with(['success' => 'Berhasil Login']);
              } else {
                return redirect('/admin/home');
              }
            }else{
                return back()->with(['error' => ' Email atau Password Salah']);
            }
        } else{
            return back()->with(['error' => 'Username atau Password Salah']);
        }
    }
    public function register()
    {
        if(Session::has('loginid')){
            return redirect('/');
        }
        $tentang = Tentang::all();
        $data = [
            'sessionget' => Session::has('loginid'),
            'tentang' => $tentang
        ]; 
        return view('/register')->with($data);
    }
    public function proses_register(Request $request)
    {
        if(Session::has('loginid')){
            return redirect('/');
        }
        $request->validate([
            'name' => 'required',
            'username' => 'required|min:5|unique:users',
            'email' => 'required|email|unique:users',
            'handphone' => 'required|unique:users',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                ],
            'policy' => 'required'
        ]);

        $user = new User;
        $user->nama = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->handphone = $request->handphone;
        $user->password = Hash::make($request->password);
        $user->is_admin = 1;
        $user->save();

        return redirect('/masuk')->with(['success' => 'Pesan Berhasil']);    
    }
    public function lupapassword()
    {
        if(Session::has('loginid')){
            return redirect('/');
        }
        $tentang = Tentang::all();
        $data = [
            'sessionget' => Session::has('loginid'),
            'tentang' => $tentang
        ]; 
        return view('lupapassword')->with($data);
    }
    public function proses_lupapassword(Request $request)
    {
        if(Session::has('loginid')){
            return redirect('/');
        }
        $request->validate([
            'email' => 'required|email'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            return redirect('/ganti-password/'.$request->email)->with(['success' => 'Berhasil Login']);
        } else {
            return back()->with(['error' => 'Username atau Password Salah']);
        }
    }
    public function gantipassword($email)
    {   
        if(Session::has('loginid')){
            return redirect('/');
        }
        $tentang = Tentang::all();
        $data = [
            'sessionget' => Session::has('loginid'),
            'email' => $email,
            'tentang' => $tentang
        ]; 
        return view('gantipassword')->with($data);
    }
    public function proses_gantipassword(Request $request)
    {
        if(Session::has('loginid')){
            return redirect('/');
        }
        $request->validate([
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                ]
        ]);
        $data = [
            'password' => Hash::make($request->password)
        ];
        $user = user::where('email', $request->email)->update($data);
        print_r($data);
        if($user){
            return redirect('/masuk')->with(['danger' => 'Berhasil Login']);
        } else {
            return back()->with(['error' => 'Username atau Password Salah']);
        }
    }
    public function logout(){
      if(Session::has('loginid')){
        Session::pull('loginid');
        Session::pull('isadmin');
        return redirect('/')->with(['info' => 'Akun Telah di Logout']);
      }
    }
}
