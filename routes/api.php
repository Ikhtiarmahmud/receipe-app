<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ReceipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/trending-categories', [CategoryController::class, 'getTrendingCategories']);
Route::get('/recipes-by-category/{categoryId}', [ReceipeController::class, 'getRecipesByCategory']);
