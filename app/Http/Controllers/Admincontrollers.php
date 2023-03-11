<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Admincontrollers extends Controller
{
    //
    public function apiuser()
    {
        $userview = User::all();
        print_r($userview);
    }
}
