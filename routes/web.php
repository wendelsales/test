<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/',[AuthController::class, 'verifyAuth'])->name('index');

Route::get('login',[AuthController::class, 'login'])->name('login');

Route::post('login',[AuthController::class, 'login']);

Route::get('/browser', [AuthController::class, 'browser'])->name('browser');