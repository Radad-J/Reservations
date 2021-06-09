<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
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
Route::get('artist/{id}', [ArtistController::class, 'show'])->where('id', '[0-9]+')->name('artist.show');

//Type routes
Route::get('type', [TypeController::class, 'index'])->name('type.index');
Route::get('type/{id}', [TypeController::class, 'show'])->where('id', '[0-9]+')->name('type.show');

//Locality routes
Route::get('locality', [LocalityController::class, 'index'])->name('locality.index');
Route::get('locality/{id}', [LocalityController::class, 'show'])->where('id', '[0-9]+')->name('locality.show');

//Role routes
Route::get('role', [RoleController::class, 'index'])->name('role.index');
Route::get('role/{id}', [RoleController::class, 'show'])->where('id', '[0-9]+')->name('role.show');

//Shows routes
Route::get('show', [ShowController::class, 'index'])->name('show.index');
Route::get('show/{id}', [ShowController::class, 'show'])->where('id', '[0-9]+')->name('show.show');
Route::get('show/create', [ShowController::class, 'create'])->name('show.create');
Route::put('show/store', [ShowController::class, 'store'])->name('show.store');
Route::get('show/search', [ShowController::class, 'search'])->name('show.search');

//CSV routes
Route::get('/show/export-to-excel', [ShowController::class, 'exportToExcel'])->name('show.excel');
Route::get('/show/export-to-csv', [ShowController::class, 'exportToCSV'])->name('show.csv');
Route::get('/show/import', [ShowController::class, 'importForm'])->name('show.import');
Route::post('/show/import-handler', [ShowController::class, 'importShows'])->name('show.importHandler');

//Representations routes
Route::get('representation', [RepresentationController::class, 'index'])->name('representation.index');
Route::get('representation/{id}', [RepresentationController::class, 'show'])->where('id', '[0-9]+')->name('representation.show');

//User routes
Route::get('user/{id}', [UserController::class, 'show'])->where('id', '[0-9]+')->name('user.show');

//Voyager routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Route des flux Russ
Route::feeds();

/* Cart Routes */
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/empty', [CartController::class, 'destroy'])->name('cart.empty');

/* Checkout Routes */
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/charge', [CheckoutController::class, 'charge'])->name('checkout.charge');
