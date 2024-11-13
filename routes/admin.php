<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PropertyController;
use Illuminate\Support\Facades\Route;


Route::middleware(['admin_guest'])->group(function(){

    Route::get('/admin/login',[LoginController::class,'showLoginPage'])->name('admin.login.page');
    Route::post('/admin/login',[LoginController::class,'login'])->name('admin.login');
});


Route::middleware(['admin_auth'])->group(function(){

    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/logout',[DashboardController::class,'logout'])->name('admin.logout');
});

Route::get('/admin/allProperties',[PropertyController::class,'allProperty'])->name('admin.allProperties.index');
Route::get('/admin/property/{id}', [PropertyController::class, 'propertyDetail'])->name('admin.pages.propertyDetail');
Route::delete('/admin/property/{id}', [PropertyController::class, 'destroy'])->name('admin.allProperties.destroy');
Route::get('/admin/addProperty', [PropertyController::class, 'addProperty'])->name('admin.pages.addProperty');
Route::post('storeProperty', [PropertyController::class, 'storeProperty'])->name('storeProperty');
Route::get('/admin/property/{id}/edit', [PropertyController::class, 'edit'])->name('admin.pages.editProperty');
Route::put('/property/{id}', [PropertyController::class, 'update'])->name('property.update');




