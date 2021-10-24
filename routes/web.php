<?php

use App\Http\Controllers\FavoriteController;
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






Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('properties', PropertyController::class);
Route::resource('favorites', FavoriteController::class);


Route::post('favorite/{property}', 'App\Http\Controllers\PropertyController@favoritePost');
Route::post('unfavorite/{property}', 'App\Http\Controllers\PropertyController@unFavoritePost');
Route::get('my_favorites', 'App\Http\Controllers\UserController@myFavorites')->middleware('auth');


require __DIR__.'/auth.php';
