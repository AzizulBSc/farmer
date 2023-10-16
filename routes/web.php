<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth']], function () {
    Route::resource('details', 'DetailsController');
    Route::resource('category', 'CategoryController');
    Route::resource('faq', 'CategoryController');
    Route::any('show/subcategory/{category}', 'CategoryController@showSubCategory')->name('show.subcategory');
});


Route::any('/optimize', function () {
    Artisan::call('optimize');
    echo 'Optimized Successfully';
});
Route::any('/migrate', function () {
    Artisan::call('migrate');
    echo 'Migrated Successfully';
});
