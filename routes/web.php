<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Models\AddProperty;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', function () {
    $properties = AddProperty::with('district')->latest()->take(3)->get();
    return view('welcome', compact('properties'));
})->name('home');

// Routes that require authentication
Route::middleware('auth')->group(function() {
    Route::get('addProperty', [FrontendController::class, 'addProperty'])->name('addProperty');
    Route::post('storeProperty', [FrontendController::class, 'storeProperty'])->name('storeProperty');
    Route::get('/property/{id}/edit', [FrontendController::class, 'edit'])->name('property.edit');
    Route::put('/property/{id}', [FrontendController::class, 'update'])->name('property.update');
});

// Public Routes
Route::get('/property/{id}', [FrontendController::class, 'propertyDetail'])->name('propertyDetail');
Route::get('searchPage', [FrontendController::class, 'searchPage'])->name('searchPage');  // Public access to search page
Route::get('/properties/search', [FrontendController::class, 'search'])->name('properties.search');

// User Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('userProfile');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Include auth routes
require __DIR__ . '/auth.php';

