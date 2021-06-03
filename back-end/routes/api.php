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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->middleware('auth:api');

Route::get('auth', 'LoginController@auth')->middleware('auth:api');;

Route::get('account', 'AccountController@index')->middleware('auth:api');
Route::put('account', 'AccountController@update')->middleware('auth:api');
Route::post('account/deposit', 'AccountController@deposit')->middleware('auth:api');