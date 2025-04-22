<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;
use App\Models\Weartype;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gender = Gender::paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.gender.view', ['gender'=>$gender, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.gender.add',['weartypes'=>$weartypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gendername'=>'required|min:3|max:12'
        ],[
            'gendername.required'=>'The gender name field is required.',
            'gendername.min'=>'The gender name field must be at least 3 characters.',
            'gendername.max'=>'The gender name field must not be greater than 12 characters.'
        ]);

        Gender::create([
            'gender_name'=>$request->gendername
        ]);

        return redirect(url('/gender'))->with('success', 'Gender added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        print_r('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//        echo "<pre>";
        print_r('edit');
//        die();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        print_r('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gender = Gender::find($id);
        $gender->delete();
        return redirect(url('/gender'))
                ->with('success', 'Gender deleted successfully');
    }
}
