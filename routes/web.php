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

    Route::prefix('certificado')->name('certificado.')->group(function() {
        Route::get('impressao/{id}', 'CertificadoController@impressao')->name('impressao');
        Route::get('visualizar/{id}', 'CertificadoController@visualizar')->name('visualizar');
        
    });
    
    
});

Route::middleware('auth')->get('logout', 'Guest\WelcomeController@logout')->name('logout');

