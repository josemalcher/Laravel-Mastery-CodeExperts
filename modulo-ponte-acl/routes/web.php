<?php

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

Route::middleware(App\Http\Middleware\AccessControlMiddleware::class)->group(function () {

    Route::get('/login', function () {
        \Illuminate\Support\Facades\Auth::loginUsingId(1);
            return redirect()->route('home');
    })->name('login');

    Route::get('/logout', function () {
        \Illuminate\Support\Facades\Auth::logout();
            return redirect()->route('home');
    })->name('logout');


    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/post/edit/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
});
