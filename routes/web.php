<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // user
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::put('/admin/users/{user}/suspend', [UserController::class, 'suspend'])->name('admin.users.suspend');
    Route::put('/admin/users/{user}/activate', [UserController::class, 'activate'])->name('admin.users.activate');
    Route::put('users/{user}/permissions', [UserController::class, 'updatePermissions'])->name('admin.users.updatePermissions');
    // category
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    //event
    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events.index');
    Route::put('/admin/events/{event}/validate', [EventController::class, 'validateEvent'])->name('admin.events.validate');

});
Route::middleware('auth')->group(function () {
    Route::get('/organizer/dashboard', function () {
        return view('organizer.dashboard');
    })->name('organizer.dashboard');
    Route::get('/organizer/events', [EventController::class, 'indexOrg'])->name('organizer.events.index');
    Route::get('/organizer/events/create', [EventController::class, 'create'])->name('organizer.events.create');
    Route::post('/organizer/events', [EventController::class, 'store'])->name('organizer.events.store');
    Route::get('/organizer/events/{event}/edit', [EventController::class, 'edit'])->name('organizer.events.edit');
    Route::put('/organizer/events/{event}', [EventController::class, 'update'])->name('organizer.events.update');
    Route::delete('/organizer/events/{event}', [EventController::class, 'destroy'])->name('organizer.events.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});
require __DIR__ . '/auth.php';

