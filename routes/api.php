<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ReceipeController;
use App\Http\Controllers\API\SearchController;
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
Route::get('/recipes', [ReceipeController::class, 'getRandomRecipes']);
Route::get('/recipe/{id}', [ReceipeController::class, 'getRecipe']);
Route::get('/articles', [ArticleController::class, 'getArticles']);
Route::get('/article/{id}', [ArticleController::class, 'getSingleArticle']);
Route::get('/search/{string}', [SearchController::class, 'search']);
Route::get('search-by-category/{categoryId}/{string?}', [SearchController::class, 'searchByCategory']);
