<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home
Route::get('/', function(){
    return view('home');
})->name('home');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// register
// urls pointing to xxx/register, will point to the index method of the Register controller
// the ->name('') allows us to href to "{{ route('name')}}" instead of href to /register
// this is a get route
Route::get('/register', [RegisterController::class, 'index'])->name('register');
// post route, this time storing a user, store method
Route::post('/register', [RegisterController::class, 'store']);

// POSTS
Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::post('/posts', [PostsController::class, 'store']);