<?php

use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SearchPropertyController;
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
Route::get('propertyPage', [FrontendController::class, 'propertyPage'])->name('propertyPage');  // Public access to search page
Route::get('/properties/search', [SearchPropertyController::class, 'search'])->name('properties.search');
// Route::get('/properties/propertyPage', [SearchPropertyController::class, 'search'])->name('properties.search');

// User Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('userProfile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/property/{id}', [FrontendController::class, 'destroy'])->name('property.delete');});

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Include auth routes
require __DIR__ . '/auth.php';

//google login routes
Route::get('auth/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);


