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

Route::get('{ticket}/paypal','PaypalController@getCheckout');
Route::get('{ticket}/finish','PaypalController@getDone');
Route::get('cancel','PaypalController@getCancel');
Route::get('twitter', 'TwitterController@receive');
Route::get('tweet', 'TicketRepliesController@tweet');

Route::get('tickets/claimTicket/{TicketId}', [
    'as'    => 'assign', //php artisan make:controller AyahController
    'uses'  =>  'TicketsController@claimTicket'
        ]);
Route::get('tickets/claimTicket2/{TicketId}', [
    'as'    => 'assign', //php artisan make:controller AyahController
    'uses'  =>  'TicketsController@claimTicket2'
    ]);
Route::get('twitter/edit', 'TwitterController@editSettings');
Route::post('twitter/store', 'TwitterController@storeSettings');
Route::post('customers/store2', 'CustomersController@store2');