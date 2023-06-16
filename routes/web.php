<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'modules.homepage.index');
Route::resource('users', UserController::class)->except(['show']);
