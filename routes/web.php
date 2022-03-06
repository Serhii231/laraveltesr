<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DiscographyHistoryController;

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