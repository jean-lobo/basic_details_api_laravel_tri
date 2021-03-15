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

   
//Route::apiResource('/details', 'BasicdetailsController')->middleware('auth:api');
//Route::post('register', [AuthController::class, 'register']);
//Route::post('/register', [AuthController::class, 'register']);
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
/*Route::apiResource('/details', 'App\Http\Controllers\API\BasicdetailsController');->middleware('auth:api');*/
//Route::post('/details', 'App\Http\Controllers\API\BasicdetailsController@store');
Route::get('/details/{id}','App\Http\Controllers\API\BasicdetailsController@show');