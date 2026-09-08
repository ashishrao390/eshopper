<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Gender;
use App\Models\Size;
use App\Models\Product;
use App\Models\Weartype;
use App\Models\Discount;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['Brand','Category','Weartype','Gender','Color','Size','Discount'])->paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.products.view', ['products' => $products, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::select('id', 'brand_name')->get();
        $category = Category::select('id', 'category_name')->get();
        $weartypes = Weartype::select('id', 'weartypes_name')->get();
        $gender = Gender::select('id', 'gender_name')->get();
        $color = Color::select('id', 'color_name')->get();
        $size = Size::select('id', 'size_label')->get();
        $discount = Discount::select('id', 'discount_label', 'discount_percentage')->get();
        return view('admin.products.add', ['brands'=>$brand, 'categories'=>$category, 'weartypes'=>$weartypes, 'genders'=>$gender, 'colors'=>$color, 'sizes'=>$size, 'discounts'=>$discount]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productname'=>'required|min:3|max:12',
            'brand'=>'required|exists:brands,id',
            'category'=>'required|exists:categories,id',
            'weartype'=>'required|exists:weartypes,id',
            'gender'=>'required|exists:genders,id',
            'color'=>'required|exists:colors,id',
            'size'=>'required|exists:sizes,id',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',
            'discount'=>'regex:/^([0-9]|[1-9][0-9]|100)(\.\d{2,4})?$/i',
            'description'=>'required|min:3|max:100',
            'image'=>'required|image|mimes:jpeg,png,svg,jpg,gif|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
        ],[
            'productname.required'=>'The product name field is required.',
            'productname.min'=>'The product name field must be at least 3 characters.',
            'productname.max'=>'The product name field must not be greater than 12 characters.',
            'brand.required'=>'The brand field is required.',
            'brand.exists'=>'The brand which you have selected does not exists.',
            'category.required'=>'The category field is required.',
            'category.exists'=>'The category which you have selected does not exists.',
            'weartype.required'=>'The wear type field is required.',
            'weartype.exists'=>'The wear type which you have selected does not exists.',
            'gender.required'=>'The gender field is required.',
            'gender.exists'=>'The gender which you have selected does not exists.',
            'color.required'=>'The color field is required.',
            'color.exists'=>'The color which you have selected does not exists.',
            'size.required'=>'The size field is required.',
            'size.exists'=>'The size which you have selected does not exists.',
            'price.required'=>'The price field is required.',
            'price.numeric'=>'The price must be numerical',
            'discount.required'=>'The discount field is required.',
            'discount.numeric'=>'The decimal field must be numeric.',
            'discount.regex'=>'The discounts must be between 00 to 100 & decimal scope should be with in 2 to 4 digits',
            'description.required'=>'The description field is required.',
            'description.min'=>'The description field must be at least 3 characters.',
            'description.max'=>'The description field must not be greater than 100 characters.',
            'image.required'=>'The image field is required.',
            'image.image'=>'The file must be an image.',
            'image.mimes'=>'Allowed image formats are: jpeg, png, jpg, gif, svg.',
            'image.max'=>'The image must not exceed 2 MB.',
            'image.dimensions'=>'The minimum width & height is 100 and maximum width & height is 2000.'
        ]);

        $originalName = $request->file('image')->getClientOriginalName();
        $filename = time() . '_' . $originalName;

        if($request->hasFile('image')){
            $tempImagePath = $request->file('image')->storeAs('uploads/users', $filename, 'public');
            session(['temp_image' => $tempImagePath]);
        }

        $imagePath = session('temp_image') ? Storage::move('public/'.session('temp_image'), 'public/images/'.basename(session('temp_image'))) : null;

        Product::create([
            'product_name' => $request->productname,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'weartype_id' => $request->weartype,
            'gender_id' => $request->gender,
            'color_id' => $request->color,
            'size_id' => $request->size,
            'price' => $request->price,
            'discount_id' => $request->discounts,
            'description' => $request->description,
            'image_url' => $filename
        ]);
        
        return redirect(url('/products'))->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $weartypes = Weartype::select('weartypes_name')->get();

        $product = Product::find($id);
        $brand = Brand::select('id', 'brand_name')->where('id', $product->brand_id)->get();
        $category = Category::select('id', 'category_name')->where('id', $product->category_id)->get();
        $weartype = Weartype::select('id', 'weartypes_name')->where('id', $product->weartype_id)->get();
        $gender = Gender::select('id', 'gender_name')->where('id', $product->gender_id)->get();
        $color = Color::select('id', 'color_name')->where('id', $product->color_id)->get();
        $size = Size::select('id', 'size_label')->where('id', $product->size_id)->get();
        $discount = Discount::select('id', 'discount_label', 'discount_percentage')->where('id', $product->discount_id)->get();

        return view('admin.products.detail',['product'=>$product, 'brands'=>$brand[0], 'categories'=>$category[0], 'weartypes'=>$weartypes, 'weartype'=>$weartype[0], 'genders'=>$gender[0], 'colors'=>$color[0], 'sizes'=>$size[0], 'discounts'=>$discount[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $weartypes = Weartype::select('weartypes_name')->get();

        $product = Product::find($id);
        $brand = Brand::select('id', 'brand_name')->where('id', $product->brand_id)->get();
        $category = Category::select('id', 'category_name')->where('id', $product->category_id)->get();
        $weartype = Weartype::select('id', 'weartypes_name')->where('id', $product->weartype_id)->get();
        $gender = Gender::select('id', 'gender_name')->where('id', $product->gender_id)->get();
        $color = Color::select('id', 'color_name')->where('id', $product->color_id)->get();
        $size = Size::select('id', 'size_label')->where('id', $product->size_id)->get();
        $discount = Discount::select('id', 'discount_label', 'discount_percentage')->where('id', $product->discount_id)->get();

        return view('admin.products.detail',['product'=>$product, 'brands'=>$brand[0], 'categories'=>$category[0], 'weartypes'=>$weartypes, 'weartype'=>$weartype[0], 'genders'=>$gender[0], 'colors'=>$color[0], 'sizes'=>$size[0], 'discounts'=>$discount[0]]);
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
        $product = Product::find($id);
        $product->delete();
        return redirect(url('/products'))
                ->with('success', 'Post deleted successfully');
    }
}
