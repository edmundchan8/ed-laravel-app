<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // contructor add middleware for authentication
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        // can access an authenticated user with variable auth()->user()
        return view('dashboard');
    }
}
