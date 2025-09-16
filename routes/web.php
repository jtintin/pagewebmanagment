<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//routes publics
Route::get('/', [PublicController::class, 'index']);
Route::get('/empresa', [PublicController::class, 'empresa']);

//routes admin total access
Route::prefix('admin')->name('admin.')-> middleware(['auth','role:admin'])->group(function(){
    //admin/dashboard
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');
    //admin/user
    Route::resource('user', UserController::class);
    //admin/category
    Route::resource('category', CategoryController::class);
    //admin/service 
    Route::resource('service', ServiceController::class);
 });
//routes editor access limited by permissions
Route::prefix('editor')-> middleware(['auth','role:editor'])->group(function(){
    //admin/dashboard
    Route::get('/dashboard', [HomeController::class, 'editorDashboard'])->name('editor.dashboard');
    //admin/users   
    Route::resource('/users', UserController::class);
});

