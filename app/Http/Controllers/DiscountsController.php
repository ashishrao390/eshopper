<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Weartype;

class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.discounts.view', ['discounts'=>$discounts, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.discounts.add',['weartypes'=>$weartypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'discountname'=>'required|min:3|max:12',
            'discountpercentage'=>'required|numeric|between:0,100',
            'startdate'=>'required|date|after:today',
            'enddate'=>'required|date|after:startdate',
        ],[
            'discountname.required'=>'The discount name field is required.',
            'discountname.min'=>'The discount name field must be at least 3 characters.',
            'discountname.max'=>'The discount name field must not be greater than 12 characters.',
            'discountpercentage.required'=>'The discount percentage field is required.',
            'discountpercentage.numeric'=>'The discount percentage field must be numeric.',
            'discountpercentage.between'=>'The discount percentage field must be between 0 to 100.',
            'startdate.required'=>'The start date field is required.',
            'startdate.date'=>'The start date field is invalid.',
            'startdate.after'=>'The start date field is valid from tomorrrow.',
            'enddate.required'=>'The end date field is required.',
            'enddate.date'=>'The end date field is invalid.',
            'enddate.after'=>'The end date field must be greater than start date.'
        ]);

        Discount::create([
            'discount_label' => $request->discountname,
            'discount_percentage' => $request->discountpercentage,
            'start_date' => $request->startdate,
            'end_date' => $request->enddate
        ]);

        return redirect(url('/discounts'))->with('success', 'Brand created successfully.');
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
        $discount = Discount::find($id);
        $discount->delete();
        return redirect(url('/discounts'))
                ->with('success', 'Post deleted successfully');
    }
}
