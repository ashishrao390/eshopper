<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weartype;
use App\Models\Gender;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $weartypes = Weartype::select('weartypes_name')->get();
        $maleCount = Product::where('gender_id','1')->count();
        $femaleCount = Product::where('gender_id', '2')->count();
        $weartypeCount = Weartype::withCount('product')->get();
        $trendyProducts = Product::orderBy('id', 'desc')->limit(20)->get();
        return view('index', ['weartypes'=>$weartypes, 'trendyProducts'=>$trendyProducts, 'weartypeCount'=>$weartypeCount, 'maleCount'=>$maleCount, 'femaleCount'=>$femaleCount]);
    }
}
