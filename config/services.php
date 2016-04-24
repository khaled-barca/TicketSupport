<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'paypal' => [
    'client_id' => 'Abay7pqCK1GGD1X3KlU72E_YNzA9TZS4DInTyD5jw8WpJ703T-53btVvYTgM4knF4ZakInBKlMW-7cZ7',
    'secret' => 'ELN4dzSS40JXKGIzCboPUEqh4jZyCEV4YjvZde5zKsis_eLYjy6FJHRyxdyz0U2WrbMQS5qmtwoklh5r'
],

];
