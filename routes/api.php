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

Route::post('signup', 'API\frontendAuth\RegisterController@signup');
Route::post('signin', 'API\frontendAuth\LoginController@signin');

Route::apiResources(['users' => 'API\UsersController']);
Route::apiResources(['products' => 'API\ProductsController']);

Route::get('profile', 'API\UsersController@profile');
Route::put('profile', 'API\UsersController@updateProfile');
Route::get('findUser', 'API\UsersController@search');
