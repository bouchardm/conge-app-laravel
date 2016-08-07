<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    if (Auth::user()) {
        return redirect('/demande');
    }
    return view('auth.login');
});
Route::get('/demande', 'HomeController@index');

Auth::routes();


Route::get('/demandes', 'DemandeController@demandes');
Route::post('/demande', 'DemandeController@saveDemande');
Route::post('/demande/{id}', 'DemandeController@updateDemande');
