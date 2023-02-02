<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Validation\UnauthorizedException;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/ping',function(){
    return['pong'=>true];
});

Route::get('/401',[AuthController::class, 'unauthorized'])->name('login');
Route::post('/auth/login',[AuthController::class,'login']);
Route::post('/auth/login',[AuthController::class,'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::post('/auth/validate',[AuthController::class,'validateToken']);
    Route::post('/auth/logout',[AuthController::class,'logout']);
});