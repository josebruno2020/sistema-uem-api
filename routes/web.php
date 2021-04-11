<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->namespace('Guest')->group(function() {
    Route::get('', 'WelcomeController@index')->name('welcome');

    Route::prefix('register')->name('register.')->group(function() {
        Route::get('', 'RegisterController@index')->name('index');
        Route::post('', 'RegisterController@save')->name('save');
    });


    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@login')->name('login.post');
    Route::get('logout', 'LoginController@logout')->name('logout');
    
    
});

Route::middleware('auth')->get('logout', 'Guest\WelcomeController@logout')->name('logout');

Route::middleware('auth')->group(function () {

    Route::prefix('module')->name('module.')->group(function() {
        Route::get('/{slug}', 'ModuleController@index')->name('index');
        Route::get('/{id}/questions', 'ModuleController@questions')->name('questions');
        Route::post('/{id}/questions', 'ModuleController@evaluateQuestions')->name('evaluate.questions');
        

        Route::prefix('preparatory')->group(function() {
            Route::get('index', 'ModuleController@preparatory')->name('preparatory');
            Route::post('preparatory', 'ModuleController@evaluatePreparatory')->name('preparatory.post');
        });
       
    });

    
});

