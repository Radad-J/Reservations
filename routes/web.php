<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TypeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Artist routes
Route::get('artist', [ArtistController::class, 'index'])->name('artist.index');
Route::get('artist/{id}', [ArtistController::class, 'show'])->name('artist.show');

//Type routes
Route::get('type', [TypeController::class, 'index'])->name('type.index');
Route::get('type/{id}', [TypeController::class, 'show'])->name('type.show');

//Locality routes
Route::get('locality', [LocalityController::class, 'index'])->name('locality.index');
Route::get('locality/{id}', [LocalityController::class, 'show'])->name('locality.show');

//Role routes
Route::get('role', [RoleController::class, 'index'])->name('role.index');
Route::get('role/{id}', [RoleController::class, 'show'])->name('role.show');

//Shows routes
Route::get('show', [ShowController::class, 'index'])->name('show.index');
Route::get('show/{id}', [ShowController::class, 'show'])->name('show.show');

//Representations routes
Route::get('representation', [RepresentationController::class, 'index'])->name('representation.index');
Route::get('representation/{id}', [RepresentationController::class, 'show'])->name('representation.show');


