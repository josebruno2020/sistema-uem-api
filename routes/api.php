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


Route::namespace('Guest')->group(function() {
    Route::post('register', 'RegisterController@save');
    Route::post('login', 'LoginController@login');
});
Route::prefix('module')->middleware('auth:api')->group(function() {
    Route::get('', 'ModuleController@index');
    Route::get('/{id}/questions', 'ModuleController@questions');
    Route::get('/{slug}', 'ModuleController@slug');
    Route::get('preparatory/index', 'ModuleController@preparatory');
});

