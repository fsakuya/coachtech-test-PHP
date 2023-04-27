<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::post('task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('task/update', [TaskController::class, 'update'])->name('task.update');
Route::post('task/delete', [TaskController::class, 'delete'])->name('task.delete');

// Route::get('/task/register', [TaskController::class, '']);

Route::get('/task/login', [TaskController::class, 'check']);
Route::post('/task/login', [TaskController::class, 'checkUser']);
