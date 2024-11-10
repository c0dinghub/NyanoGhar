<?php

use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;
use App\Models\AddProperty;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', function () {
    $favourites= getUserFavourites();
    $properties = AddProperty::with('district')->latest()->take(3)->get();
    return view('welcome', compact('properties','favourites'));
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
// Route::get('/properties/search', [FrontendController::class, 'search'])->name('properties.search');

// User Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('userProfile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/property/{id}', [FrontendController::class, 'destroy'])->name('property.delete');});

    Route::middleware(['auth'])->group(function () {
        Route::post('/favourites/add/{property}', [UserController::class, 'addToFavourites'])->name('favourites.add');
        Route::post('/favourites/remove/{property}', [UserController::class, 'removeFromFavourites'])->name('favourites.remove');
        Route::get('/favourites', [UserController::class, 'showFavourites'])->name('favourites.index');
    });

// Dashboard Route
Route::get('admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('auth/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);
// Include auth routes
require __DIR__ . '/auth.php';

//google login routes


