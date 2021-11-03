<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth;
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






Route::get('/', [HomePageController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/adminpanel', function () {
    return view('admin.panel');
})->middleware('admin');




Route::resource('properties', PropertyController::class);

Route::as('admin.')->group(function () {

    return Route::resource('admin/users', UserController::class)->middleware('admin');
});


Route::post('favorite/{property}', 'App\Http\Controllers\PropertyController@favoritePost');
Route::post('unfavorite/{property}', 'App\Http\Controllers\PropertyController@unFavoritePost');


Route::get('/my_favorites',[FavoriteController::class, 'allFavorites'])->middleware(['auth']);


require __DIR__.'/auth.php';
