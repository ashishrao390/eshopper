<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Weartype;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.sizes.view', ['sizes'=>$sizes, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.sizes.add', ['weartypes'=>$weartypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'saleslabel'=>'required|min:1|max:4'
        ],[
            'saleslabel.required'=>'The sales label field is required.',
            'saleslabel.min'=>'The sales label field must be at least 3 characters.',
            'saleslabel.max'=>'The sales label field must not be greater than 12 characters.',
        ]);

        Size::create([
            'size_label'=>$request->saleslabel
        ]);

        return redirect(url('/sizes'))->with('success','Size created successfully.');
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
        $sizes = Size::find($id);
        $sizes->delete();
        return redirect(url('/sizes'))
                ->with('success','Size deleted successfully');
    }
}
