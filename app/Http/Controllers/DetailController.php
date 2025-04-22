<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Weartype;
use App\Models\Discount;

class DetailController extends Controller
{
    public function index(){
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('detail',['weartypes'=>$weartypes]);
    }

    public function show(string $id){
        $products = Product::with(['Brand','Category','Color','Gender','Size','Weartype','Discount'])->find($id);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('detail', ['weartypes'=>$weartypes,'products' => $products]);
    }    
}
