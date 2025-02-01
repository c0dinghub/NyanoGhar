<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;


Route::middleware(['admin_guest'])->group(function(){

    Route::get('/admin/login',[LoginController::class,'showLoginPage'])->name('admin.login.page');
    Route::post('/admin/login',[LoginController::class,'login'])->name('admin.login');
});


Route::middleware(['admin_auth'])->group(function(){

    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/logout',[DashboardController::class,'logout'])->name('admin.logout');
});

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

//user controller
Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.allUsers.index');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.allUsers.show');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.allUsers.destroy');

});

//agent route
Route::resource('agents', AgentController::class)->middleware('auth');
Route::get('/agents', [AgentController::class, 'index'])->name('admin.agent.index');


//property controller
Route::get('/admin/allProperties',[PropertyController::class,'allProperty'])->name('admin.allProperties.index');
Route::get('/admin/property/{id}', [PropertyController::class, 'propertyDetail'])->name('admin.pages.propertyDetail');
Route::delete('/admin/property/{id}', [PropertyController::class, 'destroy'])->name('admin.allProperties.destroy');
Route::get('/admin/addProperty', [PropertyController::class, 'addProperty'])->name('admin.pages.addProperty');
Route::post('/admin/storeProperty', [PropertyController::class, 'storeProperty'])->name('admin.storeProperty');
Route::get('/admin/property/{id}/edit', [PropertyController::class, 'edit'])->name('admin.pages.editProperty');
Route::put('/admin/property/{id}', [PropertyController::class, 'update'])->name('admin.property.update');




