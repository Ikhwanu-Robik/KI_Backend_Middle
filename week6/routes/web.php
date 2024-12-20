<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::redirect('/', '/profile');

Route::get('/profile', [ProfileController::class, 'getData']);
