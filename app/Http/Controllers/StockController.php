<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Weartype;
use App\Models\Gender;
use App\Models\Color;
use App\Models\Size;
use App\Models\Discount;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock = Stock::with(['Product','Brand','Category','Weartype','Gender','Color','Size','Discount'])
        ->select('stocks.*','products.*','brands.brand_name','categories.category_name','weartypes.weartypes_name','genders.gender_name','colors.color_name','sizes.size_label','discounts.discount_percentage')
        ->join('products','stocks.product_id','=','products.id')
        ->join('brands','brands.id','=','products.brand_id')
        ->join('categories','categories.id','=','products.category_id')
        ->join('weartypes','weartypes.id','=','products.weartype_id')
        ->join('genders','genders.id','=','products.gender_id')
        ->join('colors','colors.id','=','products.color_id')
        ->join('sizes','sizes.id','=','products.size_id')
        ->join('discounts','discounts.id','=','products.discount_id')
        ->paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.stock.view', ['stocks'=>$stock, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "Create";
        //$weartypes = Weartype::select('weartypes_name')->get();
        //$products = Product::select('Product.id','Product.product_name', 'Product.price','Product.description','Product.image_url','Brand.brand_name','Category.category_name','Weartype.weartypes_name','Gender.gender_name','Color.color_name','Size.size_label','Discount.discount_label','Discount.discount_percentage','Discount.start_date','Discount.end_date')->with(['Brand','Category','Weartype','Gender','Color','Size','Discount'])->get();
        $products = Product::select(
            'products.id',
            'products.product_name',
            'products.price',
            'products.description',
            'products.image_url',
            'brands.brand_name',
            'categories.category_name',
            'weartypes.weartypes_name',
            'genders.gender_name',
            'colors.color_name',
            'sizes.size_label',
            'discounts.discount_label',
            'discounts.discount_percentage',
            'discounts.start_date',
            'discounts.end_date'
        )
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('weartypes', 'products.weartype_id', '=', 'weartypes.id')
        ->join('genders', 'products.gender_id', '=', 'genders.id')
        ->join('colors', 'products.color_id', '=', 'colors.id')
        ->join('sizes', 'products.size_id', '=', 'sizes.id')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->get();

        $weartypes = Weartype::select('id', 'weartypes_name')->get();
        $gender = Gender::select('id', 'gender_name')->get();
        $color = Color::select('id', 'color_name')->get();
        $size = Size::select('id', 'size_label')->get();

        return view('admin.stock.add', ['weartypes'=>$weartypes, 'products'=>$products, 'genders'=>$gender, 'colors'=>$color, 'sizes'=>$size]);

    }

    public function selectProduct(Request $request){
        //echo "<pre>";
        //print_r($request->all());
        //echo "Lancer";
      //  $jsonString = json_encode('hello'); 
    //    return $jsonString;
        /*return response()->json([
            'message' => 'Value received',
            'value' => 'hello'
        ]);*/
//        return 100;

        $selectedValue = $request->input('value');

        $products = Product::select(
            'products.id',
            'products.product_name',
            'products.price',
            'products.description',
            'products.image_url',
            'brands.brand_name',
            'categories.category_name',
            'weartypes.weartypes_name',
            'genders.gender_name',
            'colors.color_name',
            'sizes.size_label',
            'discounts.discount_label',
            'discounts.discount_percentage',
            'discounts.start_date',
            'discounts.end_date'
        )
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('weartypes', 'products.weartype_id', '=', 'weartypes.id')
        ->join('genders', 'products.gender_id', '=', 'genders.id')
        ->join('colors', 'products.color_id', '=', 'colors.id')
        ->join('sizes', 'products.size_id', '=', 'sizes.id')
        ->join('discounts', 'products.discount_id', '=', 'discounts.id')
        ->where('products.id', '=', $selectedValue)
        ->get();

        //$jsonString = json_encode($products); 
        //return $jsonString;

        // Proper JSON response
        /*return response()->json([
            'message' => 'Product selected successfully',
            'value' => $selectedValue,
            'result' => $products
        ], 200);*/
        //return true;

        //if ($products[0]['id']) {
            return response()->json([
                'data' => [
                    'id' => $products[0]['id'],
                    'product_name' => $products[0]['product_name'],
                    'price' => $products[0]['price'],
                    'description' => $products[0]['description'],
                    'image_url' => $products[0]['image_url'],
                    'brand_name' => $products[0]['brand_name'],
                    'category_name' => $products[0]['category_name'],
                    'weartypes_name' => $products[0]['weartypes_name'],
                    'gender_name' => $products[0]['gender_name'],
                    'color_name' => $products[0]['color_name'],
                    'size_label' => $products[0]['size_label'],
                    'discount_label' => $products[0]['discount_label'],
                    'discount_percentage' => $products[0]['discount_percentage'],
                    'start_date' => $products[0]['start_date'],
                    'end_date' => $products[0]['end_date']
                ]
            ]);
        //}

        //return response()->json(['error' => 'Details not found.'], 404);

        //return json_encode($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
        $request->validate([
            'product'=>'required',
            'quantity'=>'regex:/^([0-9]|[1-9][0-9])$/i',
            'quantity'=>'required|numeric'
        ],[
            'product.required'=>'The product field is required.',
            'quantity.required'=>'The quantity field is required.',
            'quantity.numeric'=>'The quantity must be numeric.',
            'quantity.regex'=>'The quantity must be integer.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        print_r('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stocks = Stock::find($id);
        $stocks->delete();
        return redirect(url('/stocks'))
                ->with('success','Post deleted successfully');
    }
}
