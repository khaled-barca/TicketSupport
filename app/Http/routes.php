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

Route::get('/',['as' => 'home','uses' => 'HomeController@index']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::resource('users','UsersController');
Route::resource('tickets','TicketsController');
Route::resource('projects','ProjectsController');
Route::resource('customers','CustomersController');
Route::resource('tickets.ticket_replies','TicketRepliesController');
Route::get('/invitations/create','InvitationsController@create');
Route::post('/invitations/store','InvitationsController@store');
Route::get('/invitations/{token}','InvitationsController@accept');
