<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weartype;

class LoginController extends Controller
{
    public function getUserLogin(){
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('login',['weartypes'=>$weartypes]);
    }

    public function postUserLogin(Request $request){
        print_r($request->all());
    }
}
