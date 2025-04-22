<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weartype;

class WearTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weartypes_data = Weartype::paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.weartypes.view', ['weartypes'=>$weartypes, 'weartypes_data'=>$weartypes_data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.weartypes.add',['weartypes'=>$weartypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'weartype'=>'required|min:3|max:12'
        ],[
            'weartype.required'=>'The wear type field is required.',
            'weartype.min'=>'The wear type field must be at least 3 characters.',
            'weartype.max'=>'The wear type field must not be greater than 12 characters.'
        ]);

        Weartype::create([
            'weartypes_name'=>$request->weartype
        ]);

        return redirect(url('weartypes'))->with('success','Wear type added successfully.');
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
        $weartypes = Weartype::find($id);
        $weartypes->delete();
        return redirect(url('/weartypes'))
                ->with('success','Wear type deleted successfully');
    }
}
