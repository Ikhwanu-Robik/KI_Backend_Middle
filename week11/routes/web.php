<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

Route::controller(AgentController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/search', 'show');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update', 'update');
    Route::get('/delete/{id}', 'delete');
    Route::delete('/destroy/{id}', 'destroy');
});