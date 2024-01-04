<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// Only views
Route::view('/', 'front.main')->name('main');
Route::view('/profile', 'front.auth.profile')->name('profile');
Route::view('admin', 'management.main')->name('admin')->middleware(['check.role','auth']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// front user controller
Route::controller(App\Http\Controllers\front\UserController::class)->prefix('user')->name('user.')->group(function () {
    Route::put('/update/{user}','update')->name('update');
});

// bakend user controller
Route::controller(App\Http\Controllers\management\UserController::class)->middleware(['check.role','auth'])->prefix('admin/user/')->name('admin.user.')->group(function () {
    Route::get('/users','index')->name('index');
    Route::get('/status/{user}','status')->name('status');
    Route::delete('delete/{user}','destroy')->name('destroy');
    Route::get('edit/{user}','edit')->name('edit');
    Route::put('update/{user}','update')->name('update');
});

// bakend category controller
Route::controller(App\Http\Controllers\management\CategoryController::class)->middleware(['check.role','auth'])->prefix('admin/category/')->name('admin.category.')->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{category}','edit')->name('edit');
    Route::post('/update/{category}','update')->name('update');
    Route::delete('/destroy/{category}','destroy')->name('destroy');
});

// bakend Article controller
Route::controller(App\Http\Controllers\management\ArticleController::class)->middleware(['check.role','auth'])->prefix('admin/article/')->name('admin.article.')->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/edit/{article}','edit')->name('edit');
    Route::post('/update/{article}','update')->name('update');
    Route::delete('/destroy/{article}','destroy')->name('destroy');
});