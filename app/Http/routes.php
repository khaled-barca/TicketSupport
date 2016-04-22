<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
//Route::get('/index2','HomeController@index2');
Route::get('tickets/create','TicketsController@create');
Route::post('tickets','TicketsController@store');
Route::get('tickets/ticket/index','TicketsController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
Route::resource('users','UsersController');
Route::resource('tickets','TicketsController');
Route::resource('projects','ProjectsController');
Route::resource('customers','CustomersController');
Route::resource('tickets.ticket_replies','TicketRepliesController');
