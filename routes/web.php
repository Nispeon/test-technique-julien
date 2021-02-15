<?php

// Appelle des class
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


// Route de retour à la hoempage
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Page de biographie
Route::get('/about', function () {
    return view('about');
});

// Page d'admin d'edit des oeuvres
Route::get('/admin', [WorksController::class, 'edit'])->middleware('admin')->name('admin');

// Liens à toutes les fonctions du UserController
Route::resource('user', UserController::class);

// Route de page de connexion
Route::get('/login', [UserController::class, 'connect'])->name('login');

// Route de connexion
Route::post('/testco', [UserController::class, 'login']);

// Liens à toutes les fonctions du WorksController
Route::resource('works', WorksController::class);

// Liens à toutes les fonctions du CommentsController
Route::resource('comment', CommentsController::class);

// Route de déconnexion
Route::get('/disconnect', function() {
    Auth::logout();
    session()->invalidate();
    return redirect()->route('home');
});



