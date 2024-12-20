<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->middleware(['login']);

Route::post('/login', [AccountController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['login']);

Route::get('/logout', [AccountController::class, 'logout']);