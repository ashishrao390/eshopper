<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Weartype;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.colors.view',['weartypes'=>$weartypes, 'colors'=>$colors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.colors.add', ['weartypes'=>$weartypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'colorname'=>'required|min:3|max:12'
        ],[
            'colorname.required'=>'The color name field is required.',
            'colorname.min'=>'The color name field must be at least 3 characters.',
            'colorname.max'=>'The color name field must not be greater than 12 characters.'
        ]);

        Color::create([
            'color_name'=>$request->colorname
        ]);

        return redirect(url('/colors'))->with('success','Color added successfully.');
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
        $color = Color::find($id);
        $color->delete();
        return redirect(url('/colors'))
                ->with('success','Color deleted successfully.');
    }
}
