<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // guest middleware, so if user is signed in, shouldn't be
    // able to go to the registration url if they tried
    public function __construct() {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //validate user enters login details before we do anything else
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember) ){
            return back()->with('status', 'Invalid login details');
        }
        else{            
            //redirect to another route
            return redirect()->route('dashboard');
        }
    }
}
