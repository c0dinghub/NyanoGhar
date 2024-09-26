<?php

use App\Http\Controllers\AddPropertyController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
})->name('home');
Route::get('addProperty', [FrontendController::class, 'addProperty'])->middleware('auth')->name('addProperty');
Route::post('storeProperty', [FrontendController::class, 'storeProperty'])->middleware('auth')->name('storeProperty');
Route::get('searchPage', [FrontendController::class, 'searchPage'])->middleware('auth')->name('searchPage');
Route::get('/property/{id}', [FrontendController::class, 'propertyDetail'])->name('propertyDetail');
Route::get('/get-districts/{province_Id}', [LocationController::class, 'getDistricts']);
Route::get('/get-local-bodies/{district_Id}', [LocationController::class, 'getLocalBodies']);
Route::get('/property/{id}/edit', [FrontendController::class, 'edit'])->name('property.edit');
Route::put('/property/{id}', [FrontendController::class, 'update'])->name('property.update');


// Route::get('userProfile', [UserController::class,'edit'])->middleware('auth')->name('userProfile');
// Route::patch('userProfile/update', [UserController::class,'update'])->middleware('auth')->name('userProfile.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('userProfile');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [UserController::class, 'userProfile'])->name('userProfile');

});

require __DIR__ . '/auth.php';
