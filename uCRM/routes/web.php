<?php

use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::resource('items', ItemController::class)
->middleware(['auth', 'verified']);

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get(
    '/inertia-test',
    function () {
        return Inertia::render('InertiaTest');
    }
);

Route::get('/inertia/index', [
    inertiaTestController::class,
    'index',
])->name('inertia.index');

Route::get('/inertia/create', [
    inertiaTestController::class,
    'create',
])->name('inertia.create');

Route::post('/inertia', [
    inertiaTestController::class,
    'store',
])->name('inertia.store');

Route::get('/inertia/show/{id}', [
    InertiaTestController::class,
    'show',
])->name('inertia.show');

Route::delete('/inertia/{id}', [
    InertiaTestController::class,
    'delete',
])->name('inertia.delete');

Route::get('/component-test', function () {
  return Inertia::render('ComponentTest');
  });

require __DIR__ . '/auth.php';
