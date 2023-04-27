<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
  'middleware' => ['auth:api'],
  'prefix' => 'auth'
], function ($router) {
  Route::post('register', [AuthController::class, 'register'])->withoutMiddleware(['auth:api']);
  Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:api']);
  Route::post('logout', [AuthController::class, 'logout']);
  Route::post('refresh', [AuthController::class, 'refresh']);
  Route::get('user', [AuthController::class, 'me']);
});
