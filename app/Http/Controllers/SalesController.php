<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Weartype;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sale = Sale::with(['user','product','discount'])->paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.sales.view', ['sales'=>$sale, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "Create";
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.sales.add', ['weartypes'=>$weartypes]);
/*        $data = Sale::with(['user','product','discount'])->find(94);
        echo "<pre>";
            print_r($data);
        echo "</pre>";*/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
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
        $sales = Sale::find($id);
        $sales->delete();
        return redirect(url('/sales'))
                ->with('success','Post deleted successfully');
    }
}
