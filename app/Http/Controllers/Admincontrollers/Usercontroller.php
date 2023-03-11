<?php

namespace App\Http\Controllers\Admincontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class Usercontroller extends Controller
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
        $request->validate([
            'email' => 'unique:users'
        ]);
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;

        $user->save();
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
        $user = User::find($id);
        $user->delete();
        
        return back()->with(['error' => 'Data berhasil dihapus']);
    }
}
