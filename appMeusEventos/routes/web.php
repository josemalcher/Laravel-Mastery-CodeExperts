<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{HomeController, EnrollmentController};
use App\Http\Controllers\Admin\{EventController, EventPhotoController, ProfileController};

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/eventos/{event:slug}',  [HomeController::class, 'show'])->name('event.single');

Route::prefix('/enrollment')->name('enrollment.')->group(function (){
    Route::get('/start/{event:slug}', [EnrollmentController::class, 'start'])->name('start');
    Route::get('/confirm', [EnrollmentController::class, 'confirm'])->name('confirm')
        ->middleware(['auth', 'verified']);
    Route::get('/process', [EnrollmentController::class, 'proccess'])->name('proccess')
        ->middleware(['auth', 'verified']);
});

Route::middleware(['auth', 'verified'])->prefix('/admin')->name('admin.')->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('events.photos', EventPhotoController::class)->only(['index', 'store', 'destroy']);

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/admin/events');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
