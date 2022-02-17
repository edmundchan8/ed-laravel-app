<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    // guest middleware, so if user is signed in, shouldn't see registration
    public function __construct() {
        $this->middleware('guest');
    }

    public function index(){
        //go to the auth folder, and load the register.blade.app view
        return view('auth.register');
    }

    // passing a $request object allows us to obtain the data from a form
    public function store(Request $request){
        //validate request
        // if the validation failes, it throws an exception
        // we pass the $request and set [rules] - check about rules on laravel website
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        //to create user and pass array to store it in the database
        //store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),   //we don't directly pass the password
        ]);

        //sign user in with the auth helper
        // instead of $request->email, $request->password, we use the only() method 
        // and pass the attributes to get the specific date neededd
        auth()->attempt(
            $request->only('email', 'password')
        );

        //redirect to another route
        return redirect()->route('dashboard');
    }
}
