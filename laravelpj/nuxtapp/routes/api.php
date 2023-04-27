<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::apiResource('/contact', ContactController::class);