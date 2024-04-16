<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class user_authenticate extends Controller
{
    //login function will return login page
    public function login()
    {
        return view('index');
    }
    //register function will return register page
    public function register()
    {
        return view('register');
    }
    // start of user register function
    //user_register function will check form acceptance criteria if acceptable then data will be inserted in database
    public function user_register(Request $request_register)
    {
        //applying validations
        $request_register->validate([
            'user_name' => 'required',
            'user_email_id' => 'required|email|unique:users',
            'user_password' => 'required|min:5|max:16',
        ]);
        // creating object of users
        $user = new Users();

        $user->user_name = $request_register->user_name;
        $user->user_email_id = $request_register->user_email_id;
        $user->user_password = hash::make($request_register->user_password);
        // saving data in database
        $result = $user->save();
        if ($result) {
            // success message
            return back()->with("success", "you are registered");
        } else {
            // failure message
            return back()->with("fail", "something went wrong with code");

        }
        //  }
    }
    // end of user register function 
// start of user login function
// user_login function will check if user exists it will create session for user
    public function user_login(Request $request_login)
    {
        // check data format
        $request_login->validate([
            'user_email_id' => 'required|email',
            'user_password' => 'required|min:5|max:16'
        ]);
        // check user exist or not if yes then check password too
        $user = users::where('user_email_id', '=', $request_login->user_email_id)->first();
        if ($user) {
            if (Hash::check($request_login->user_password, $user->user_password)) {
                // session will create
                $request_login->session()->put('loginId', $user->id);
                return redirect('dashboard');
                // return back()->with("success", "welcome buddy");            
            } else {
                // return fail  if password is wrong
                return back()->with("fail", "please fill correct password");
            }
        } else {
            // return fail  if email id is wrong
            return back()->with("fail", "email not registered to us");
        }
    }
    // end of user_login function
    // start of dashboard function
    public function dashboard()
    {
        $data = array();
        // check if session_id exists than sends corresponding user data
        if (Session::has('loginId')) {
            $data = users::where('id', '=', Session::get('loginId'))->first();
        }
        // send user data
        return view('dashboard', compact('data'));
    }
    // end of dashboard function
    // start of logout
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect("index");
        }
    }
    // end of logout functon 
}
