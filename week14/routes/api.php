<?php

use App\Http\Controllers\UserSignup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\UserLogout;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', UserLogin::class)->name('api.login');

Route::post('/logout', UserLogout::class)->name('api.logout')->middleware('auth:sanctum');

Route::post('/signup', UserSignup::class)->name('api.signup');

Route::apiResource('blogs', BlogController::class)->middleware('auth:sanctum');

Route::get('/blogs/{blog}/{slug}', [BlogController::class, 'show'])->name('blogs.showwithslug');
