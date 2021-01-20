<?php

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

Route::prefix('/products')->group(function () {

    Route::get('/all', 'ProductController@all');
    Route::get('/show/{id}', 'ProductController@show');
    Route::post('/create', 'ProductController@create');
    Route::post('/upload-image/{id}', 'ProductController@uploadImage');
    Route::get('/remove/{id}', 'ProductController@remove');

    Route::get('/get-array/{number}', 'Massive\SimpleMassiveController@getMassive');
});