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

Route::apiResource('/products','ProductController');

//products/3/review
//['prefix'=>'products']          products
//{product}                       3
//review                          review
Route::group(['prefix'=>'products'],function(){
    
    Route::apiResource('/{product}/review','ReviewController');
});
