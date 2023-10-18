<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
// Route::group(['namespace' => 'App\Http\Controllers\Api', 'middleware' => ['auth:api']], function () {
Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('details', 'DetailsController');
    Route::resource('faq', 'FaqController');
    Route::get('prodtech/{prodtech}', 'ProductionTechController@show');
    Route::get('prodtechs/{category_id}', 'ProductionTechController@getParentProdTech');
    Route::get('subprodtechs', 'ProductionTechController@getSubProdTech');
});
