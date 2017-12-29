<?php

use Illuminate\Http\Request;

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

//Recipes
Route::get('/recipes', 'RecipeController@index');
Route::get('/recipes/{id}', 'RecipeController@show');
Route::post('/recipes', 'RecipeController@store');
Route::put('/recipes/{id}', 'RecipeController@update');

//Chefs
Route::get('/chefs', 'ChefController@index');
Route::get('/chefs/{id}', 'ChefController@show');

//Entrees