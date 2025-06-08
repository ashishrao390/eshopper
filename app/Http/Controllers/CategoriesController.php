<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Weartype;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.categories.view',['categories'=>$categories, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.categories.add',['weartypes'=>$weartypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryname'=>'required|min:3|max:12'
        ],[
            'categoryname.required'=>'The category name field is required.',
            'categoryname.min'=>'The category name field must be at least 3 characters.',
            'categoryname.max'=>'The category name field must not be greater than 12 characters.',
        ]);

        Category::create([
            'category_name'=>$request->categoryname
        ]);

        return redirect(url('/categories'))->with('success','Category added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.categories.detail',['weartypes'=>$weartypes, 'category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.categories.edit',['weartypes'=>$weartypes, 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'categoryname'=>'required|min:3|max:12'
        ],[
            'categoryname.required'=>'The category name field is required.',
            'categoryname.min'=>'The category name field must be at least 3 characters.',
            'categoryname.max'=>'The category name field must not be greater than 12 characters.',
        ]);

        $category->update([
            'category_name'=>$request->categoryname
        ]);

        return redirect(url('/categories'))->with('success','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect(url('/categories'))
                ->with('success','Category deleted successfully');
    }
}
