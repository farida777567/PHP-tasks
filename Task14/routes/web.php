<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('x');
});

Route::get('/create-users', [UserController::class, 'createUsers']);
Route::get('/show-users', [UserController::class, 'showUsers']);