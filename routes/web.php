<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorksController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/oeuvres', function () {
    return view('works');
});

Route::get('/admin', [WorksController::class, 'edit'])->middleware('admin')->name('admin');

Route::resource('user', UserController::class);

Route::get('/login', [UserController::class, 'connect']);

Route::post('/testco', [UserController::class, 'login']);

Route::resource('works', WorksController::class);

Route::resource('comment', CommentsController::class);

Route::get('/disconnect', function() {
    Auth::logout();
    session()->invalidate();
    return redirect()->route('home');
});



