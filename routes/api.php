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

Route::group([ 'prefix' => 'v1', 'namespace' => 'API' ], function () {

    Route::group([ 'prefix' => 'auth'], function () {

        Route::post('/register', 'AuthController@register');
        Route::post('/login', 'AuthController@login');

        Route::group([ 'middleware' => 'auth:api' ], function () {
            Route::get('/me', 'AuthController@me');
            Route::get('/refresh', 'AuthController@refresh');
            Route::post('/logout', 'AuthController@logout');
        });

    });

//    Route::middleware('auth:api')->get('/user', function (Request $request) {
//        return $request->user();
//    });

});


