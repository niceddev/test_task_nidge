<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'modules.homepage.index');

Route::resource('users', UserController::class)->except(['show']);

Route::controller(NotificationController::class)->name('notifications.')->prefix('notifications')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/send', 'send')->name('send');
});
