<?php

use App\Http\Controllers\ArtistApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowApiController;
use App\Http\Controllers\LocationApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Show api routes
Route::resource('shows', ShowApiController::class);
Route::get('/shows', [ShowApiController::class, 'index'])->name('getAllShows');
Route::get('/show/{id}', [ShowApiController::class, 'show'])->where('id','[0-9]+')->name('getShow');

//Location api routes
Route::resource('location', LocationApiController::class);
Route::get('locations', [LocationApiController::class, 'index'])->name('getAllLocations');
Route::get('location/{id}', [LocationApiController::class, 'show'])->where('id', '[0-9]+')->name('getLocation');

//Artist api routes
Route::resource('artist', ArtistApiController::class);
Route::get('artists', [ArtistApiController::class, 'index'])->name('getAllArtists');
Route::get('artist/{id}', [ArtistApiController::class, 'show'])->where('id', '[0-9]+')->name('getArtist');
