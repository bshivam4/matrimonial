<?php

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

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', 'HomeController@index');
        Route::get('/demo', 'HomeController@demo');
        Route::get('/addindividual', 'IndividualsController@index');
        Route::post('/addindividual', 'IndividualsController@store');
        Route::get('/find', 'MatchController@index');
        Route::post('/find', 'MatchController@search');
        Route::get('/getCity', 'AjaxController@getCity');
});
