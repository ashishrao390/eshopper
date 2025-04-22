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


class ShopController extends Controller
{
    public function index(){
        $colors = Color::select('id','color_name')->distinct()->get();
        $sizes = Size::select('id','size_label')->distinct()->get();
        $weartypes = Weartype::select('weartypes_name')->get();
        $products = Product::with(['Brand','Category','Color','Gender','Size','Weartype','Discount'])->paginate(50);
        return view('shop',['colors' => $colors, 'sizes' => $sizes, 'products' => $products, 'weartypes'=>$weartypes]);
    }

    public function menuweartypes($weartypename){

        if($weartypename == 'Men\'s dresses'){
            $products = Product::with(['Brand', 'Category', 'Color', 'Gender', 'Size', 'Weartype', 'Discount'])
                                ->join('genders', 'products.gender_id', '=', 'genders.id')
                                ->select('products.*', 'genders.gender_name')
                                ->where('genders.gender_name', 'male')
                                ->orderBy('genders.id', 'desc')
                                ->paginate(50);
            $colors = Color::select('id','color_name')->distinct()->get();
            $sizes = Size::select('id','size_label')->distinct()->get();
            $weartypes = Weartype::select('weartypes_name')->get();
            return view('shop',['colors' => $colors, 'sizes' => $sizes, 'products' => $products, 'weartypes'=>$weartypes, 'weartypename'=>'Men\'s dresses']);
        }
        else if($weartypename == 'Women\'s dresses'){
            $products = Product::with(['Brand', 'Category', 'Color', 'Gender', 'Size', 'Weartype', 'Discount'])
                                ->join('genders', 'products.gender_id', '=', 'genders.id')
                                ->select('products.*', 'genders.gender_name')
                                ->where('genders.gender_name', 'female')
                                ->orderBy('genders.id', 'desc')
                                ->paginate(50);
            $colors = Color::select('id','color_name')->distinct()->get();
            $sizes = Size::select('id','size_label')->distinct()->get();
            $weartypes = Weartype::select('weartypes_name')->get();
            return view('shop',['colors' => $colors, 'sizes' => $sizes, 'products' => $products, 'weartypes'=>$weartypes, 'weartypename'=>'Women\'s dresses']);
        }
        else{
            $products = Product::with(['Brand', 'Category', 'Color', 'Gender', 'Size', 'Weartype', 'Discount'])
                                ->join('weartypes', 'weartypes.id', '=', 'products.weartype_id')
                                ->select('products.*', 'weartypes.weartypes_name')
                                ->where('weartypes.weartypes_name', 'like', $weartypename)
                                ->orderBy('weartype_id', 'desc')
                                ->paginate(50);
            $colors = Color::select('id','color_name')->distinct()->get();
            $sizes = Size::select('id','size_label')->distinct()->get();
            $weartypes = Weartype::select('weartypes_name')->get();                    
            return view('shop',['colors' => $colors, 'sizes' => $sizes, 'products' => $products, 'weartypes'=>$weartypes, 'weartypename'=>$weartypename]);
        }

    }

    public function menumaleproducts(){

    }

    public function menufemaleproducts(){

    }
}
