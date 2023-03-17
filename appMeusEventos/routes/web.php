<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{HomeController, EnrollmentController};
use App\Http\Controllers\Admin\{EventController, EventPhotoController, ProfileController};


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/eventos/{event:slug}',  [HomeController::class, 'show'])->name('event.single');

Route::prefix('/enrollment')->name('enrollment.')->group(function (){
    Route::get('/start/{event:slug}', [EnrollmentController::class, 'start'])->name('start');
    Route::get('/confirm', [EnrollmentController::class, 'confirm'])->name('confirm')->middleware('auth');
    Route::get('/process', [EnrollmentController::class, 'proccess'])->name('proccess')->middleware('auth');
});

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('events.photos', EventPhotoController::class)->only(['index', 'store', 'destroy']);

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
