<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weartype;
use App\Models\Admin;
use App\Rules\password;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weartypes = Weartype::select('weartypes_name')->get();
        $admins = Admin::paginate(10);
        return view('admin.admin.view', ['admins' => $admins, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "Create";
        //return view('registration');
        $weartypes = Weartype::select('weartypes_name')->get();
        $users = User::select('id','email')->get();
        return view('admin.admin.add',['weartypes'=>$weartypes, 'users'=>$users]);
    }

    public function selectEmail(Request $request){
        $id = $request->input('value');
        $users = User::find($id);
        return response()->json([
            'data' => [
                'id' => $users['id'],
                'username' => $users['username'],
                'fname' => $users['fname'],
                'lname' => $users['lname'],
                'gender_id' => $users['gender_id'],
                'age' => $users['age'],
                'phone' => $users['phone'],
                'email' => $users['email'],
                'address' => $users['address'],
                'state' => $users['state']
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
        $request->validate([
            'selectemail'=>'required'
        ],
        [
            'selectemail.required' => 'The email  is required.',
        ]
    );
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
        $admin = Admin::find($id);
        $admin->delete();
        return redirect(url('admin'))
                ->with('success', 'Post deleted successfully');
    }
}
