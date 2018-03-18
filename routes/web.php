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

Route::view('/', 'main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/help', 'help');

/* OBSERVATION METHODS */
Route::get('/observations', ['uses' => 'ObservationsController@index']);
Route::get('/teach-data', ['uses' => 'TeachersController@teachdata']);
Route::get('/observations/datatables', ['as' => 'observations.datatables', 'uses' => 'ObservationsController@datatables']);
Route::get('/observations/mydatatables', ['as' => 'teachers.mydatatables', 'uses' => 'TeachersController@mydatatables']);
Route::get('observations/maps', ['uses' => 'ObservationsController@maps']);
Route::get('teach-data/maps', ['uses' => 'TeachersController@maps']);
Route::get('/observations/mapdata', ['as' => 'observations.mapdata', 'uses' => 'ObservationsController@mapdata']);

/* PROGRAM METHODS */
Route::get('/programs', ['uses' => 'ProgramsController@index']);

Route::get('/programs/create', ['uses' => 'ProgramsController@create','middleware' => 'auth']);

Route::post('/programs', ['uses' => 'ProgramsController@store']);

Route::get('programs/{program}', ['uses' => 'ProgramsController@show']);

Route::get('programs/{program}/edit', ['uses' => 'ProgramsController@edit']);

Route::patch('programs/{program}', ['uses' => 'ProgramsController@update']);

/* TEACHER METHODS */
Route::get('/teachers', ['uses' => 'TeachersController@index']);

Route::get('/teachers/{teacher}', ['uses' => 'TeachersController@show']);

Route::get('/teachers/{teacher}/edit', ['uses' => 'TeachersController@edit']);

Route::patch('/teachers/{teacher}', ['uses' => 'TeachersController@update']);

/* LOCATION METHODS */
Route::get('/locations', ['uses' => 'LocationsController@index']);

Route::get('/locations/create', ['uses' => 'LocationsController@create']);

Route::post('/locations', ['uses' => 'LocationsController@store']);

Route::get('/locations/{location}', ['uses' => 'LocationsController@show']);

Route::get('/locations/{location}/edit', ['uses' => 'LocationsController@edit']);

Route::patch('/locations/{location}', ['uses' => 'LocationsController@update']);

/* GROUP METHODS */
Route::get('/groups', ['uses' => 'GroupsController@index']);

Route::get('/groups/create', ['uses' => 'GroupsController@create']);

Route::post('/groups', ['uses' => 'GroupsController@store']);

Route::get('/groups/{group}', ['uses' => 'GroupsController@show']);

Route::get('/groups/{group}/edit', ['uses' => 'GroupsController@edit']);

Route::patch('/groups/{group}', ['uses' => 'GroupsController@update']);


