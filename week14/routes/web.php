<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/login', function (Request $request) {
	return view('login'); 
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/blogs/create', function () {
	return view('createBlog');
})->name('blogs.create');
