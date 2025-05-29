<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\password;
use App\Models\Weartype;

class LoginController extends Controller
{
    public function getUserLogin(){
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('login',['weartypes'=>$weartypes]);
    }

    public function postUserLogin(Request $request){
        $credentials = $request->validate([
            'username'=>'required|email', 
            'password'=>['required']
        ],
        [
            'username.required'=>'The user name field is required.',
            'username.email'=>'The user name field should be an email.',
            'password.required'=>'The password field is required.'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            $user = Auth::user();

            return redirect('/');
        }
        return redirect('/login');

        print_r($request->all());
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
