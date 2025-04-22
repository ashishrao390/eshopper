<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weartype;

class CartController extends Controller
{
    public function index(){
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('cart', ['weartypes'=>$weartypes]);
    }
}
