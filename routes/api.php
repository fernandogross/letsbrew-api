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

Route::middleware(['cors'])->group(function () {
    /** Hops */
    Route::get('/hops', 'HopController@index');
    Route::get('/hops/{id}', 'HopController@read');
    Route::put('/hops/{id}', 'HopController@update');
    Route::post('/hops', 'HopController@create');
    Route::delete('/hops/{id}', 'HopController@delete');
});

