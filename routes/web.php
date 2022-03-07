<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DiscographyHistoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::get('/', [MainController::class, 'index'])->name('main');;

Route::get('/about', [AboutController::class, 'index'])->name('about');;

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/discography-histories', [DiscographyHistoryController::class, 'index'])
    ->name('discography_histories');

Route::get('/authorization', [AuthorizationController::class, 'index'])->name('authorization');
Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
Route::POST('/registration/submit', [RegistrationController::class, 'registration'])->name('registration_check');
Route::POST('/authorization_submit', [AuthorizationController::class, 'authorization'])->name('authorization_submit');
Route::get('/exit', [AuthorizationController::class, 'exit'])->name('exit');
Auth::routes(['verify' => true]);
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    dd('test');
    return redirect()->route('main');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');