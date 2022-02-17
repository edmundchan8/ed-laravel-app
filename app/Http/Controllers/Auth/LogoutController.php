<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        // log out user
        auth()->logout();
        // redirect user to home page 
        return redirect()->route('home');
    }
}
