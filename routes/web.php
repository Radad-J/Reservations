<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Artist routes
Route::get('artist', [ArtistController::class, 'index'])->name('index');
Route::get('artist/{id}', [ArtistController::class, 'show'])->name('show');

//Type routes
Route::get('type', [TypeController::class, 'index'])->name('index');
Route::get('type/{id}', [TypeController::class, 'show'])->name('show');


