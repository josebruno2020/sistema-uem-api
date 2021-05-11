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

Route::middleware('auth:api')->group(function() {

    Route::prefix('module')->group(function() {
        Route::get('', 'ModuleController@index');
        Route::get('/show/{id}', 'ModuleController@show');
        Route::get('/{id}/questions', 'ModuleController@questions');
        Route::post('/{id}/questions', 'ModuleController@evaluateQuestions');
        Route::get('/{slug}', 'ModuleController@slug');
        Route::get('preparatory/index', 'ModuleController@preparatory');
        Route::post('preparatory/index', 'ModuleController@evaluatePreparatory');
    });

    Route::prefix('class')->group(function() {
        Route::get('{id}', 'ClassController@index');
    });
    
});


