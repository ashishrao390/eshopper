<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Weartype;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.brand.view',['brands'=>$brands, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.brand.add',['weartypes'=>$weartypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brandname'=>'required|min:3|max:12',
        ],
        [
            'brandname.required' => 'The brand name field is required.',
            'brandname.min' => 'The brand name field must be at least 3 characters.',
            'brandname.max' => 'The brand name field must not be greater than 12 characters.',
        ]);

        Brand::create([
            'brand_name' => $request->brandname
        ]);

        return redirect(url('/brand'))->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.brand.detail',['weartypes'=>$weartypes, 'brand'=>$brand]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.brand.edit',['weartypes'=>$weartypes, 'brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'brandname'=>'required|min:3|max:12',
        ],
        [
            'brandname.required' => 'The brand name field is required.',
            'brandname.min' => 'The brand name field must be at least 3 characters.',
            'brandname.max' => 'The brand name field must not be greater than 12 characters.',
        ]);

        $brand->update([
            'brand_name' => $request->brandname
        ]);

        return redirect(url('/brand'))->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect(url('/brand'))
                ->with('success','Brand deleted successfully');
    }
}
