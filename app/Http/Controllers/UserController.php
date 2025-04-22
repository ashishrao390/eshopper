<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\password;
use App\Models\User;
use App\Models\Weartype;

class UserController extends Controller
{
    public function getUserRegistration(){
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('registration', ['weartypes'=>$weartypes]);
    }

    public function postUserRegistration(Request $request) {
        $request->validate([
            'username'=>'required|min:3|max:12',
            'password'=> ['required', 'min:3', 'max:12', new password],
            'cpassword'=> ['required', 'min:3', 'max:12', new password],
            'fname'=>'required|min:3|max:12',
            'lname'=>'required|min:1|max:12',
            'gender'=>'required',
            'age'=>'required',
            'phonenumber'=>'required|numeric|min:10|max:10',
            'email'=>'required|email|min:5|max:20',
            'address'=>'required|min:5|max:25',
            'state'=>'required',
            'rdate'=>'required',
            'terms'=>'required',
            'newsletter'=>'required',
            'promotions'=>'required'

        ],
        [
            'username.required' => 'The user name field is required.',
            'username.min' => 'The user name field must be at least 3 characters.',
            'username.max' => 'The user name field must not be greater than 12 characters.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password field must be at least 3 characters.',
            'password.max' => 'The password field must not be greater than 12 characters.',            
            'cpassword.required' => 'The confirm password field is required.',
            'cpassword.min' => 'The confirm password field must be at least 3 characters.',
            'cpassword.max' => 'The password field must not be greater than 12 characters.',
            'fname.required' => 'The first name field is required.',
            'fname.min' => 'The first name field must be at least 3 characters.',
            'fname.max' => 'The password field must not be greater than 12 characters.',
            'lname.required' => 'The last name field is required.',
            'lname.min' => 'The last name field must be at least 3 characters.',
            'lname.max' => 'The password field must not be greater than 12 characters.',
            'gender.required' => 'The gender field is required.',
            'age.required' => 'The age field is required.',
            'phonenumber.required' => 'The mobile phone number field is required.',
            'phonenumber.min' => 'The mobile phone number field must be a length of characters.',
            'phonenumber.max' => 'The mobile phone number field must be a length of characters.',
            'email.required' => 'The email field is required.',
            'email.email' => '',
            'email.min' => 'The email field must be at least 5 characters.',
            'email.max' => 'The email field must not be greater than 20 characters.',
            'address.required' => 'The address field is required.',
            'address.min' => 'The address field must be at least 5 characters.',
            'address.max' => 'The address field must not be greater than 25 characters.',
            'state.required' => 'The state field is required.',
            'rdate.required' => 'The registration date field is required.',
            'terms.required' => 'The terms field is required.',
            'newsletter.required' => 'The newsletter field is required.',
            'promotions.required' => 'The promotions field is required.',
        ]
    );
    }

        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(10);
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.users.view', ['users'=>$user, 'weartypes'=>$weartypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "Create";
        $weartypes = Weartype::select('weartypes_name')->get();
        return view('admin.users.add', ['weartypes'=>$weartypes]);

/*        $user = User::find(1);
        $sale = $user->sale; // Get the sale associated with the user

        $users = User::with('sale')->get(); // Eager load the sale relationship


        echo "<pre>";
        print_r($users);
        echo "</pre>";*/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
        $request->validate([
            'username'=>'required|min:3|max:12',
            'password'=> ['required', 'min:3', 'max:12', new password],
            'cpassword'=> ['required', 'min:3', 'max:12', new password],
            'fname'=>'required|min:3|max:12',
            'lname'=>'required|min:1|max:12',
            'gender'=>'required',
            'age'=>'required',
            'phonenumber'=>'required|numeric|min:10|max:10',
            'email'=>'required|email|min:5|max:20',
            'address'=>'required|min:5|max:25',
            'state'=>'required',
            'rdate'=>'required',
            'terms'=>'required',
            'newsletter'=>'required',
            'promotions'=>'required'

        ],
        [
            'username.required' => 'The user name field is required.',
            'username.min' => 'The user name field must be at least 3 characters.',
            'username.max' => 'The user name field must not be greater than 12 characters.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password field must be at least 3 characters.',
            'password.max' => 'The password field must not be greater than 12 characters.',            
            'cpassword.required' => 'The confirm password field is required.',
            'cpassword.min' => 'The confirm password field must be at least 3 characters.',
            'cpassword.max' => 'The password field must not be greater than 12 characters.',
            'fname.required' => 'The first name field is required.',
            'fname.min' => 'The first name field must be at least 3 characters.',
            'fname.max' => 'The password field must not be greater than 12 characters.',
            'lname.required' => 'The last name field is required.',
            'lname.min' => 'The last name field must be at least 3 characters.',
            'lname.max' => 'The password field must not be greater than 12 characters.',
            'gender.required' => 'The gender field is required.',
            'age.required' => 'The age field is required.',
            'phonenumber.required' => 'The mobile phone number field is required.',
            'phonenumber.min' => 'The mobile phone number field must be a length of characters.',
            'phonenumber.max' => 'The mobile phone number field must be a length of characters.',
            'email.required' => 'The email field is required.',
            'email.email' => '',
            'email.min' => 'The email field must be at least 5 characters.',
            'email.max' => 'The email field must not be greater than 20 characters.',
            'address.required' => 'The address field is required.',
            'address.min' => 'The address field must be at least 5 characters.',
            'address.max' => 'The address field must not be greater than 25 characters.',
            'state.required' => 'The state field is required.',
            'rdate.required' => 'The registration date field is required.',
            'terms.required' => 'The terms field is required.',
            'newsletter.required' => 'The newsletter field is required.',
            'promotions.required' => 'The promotions field is required.',
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
        $users = User::find($id);
        $users->delete();
        return redirect(url('/users'))
                ->with('success','Post deleted successfully');
    }
}
