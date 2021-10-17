<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1677292205814207',
        'client_secret' => 'd41611cce36abb3c6672b685aa086e96',
        'redirect' => 'http://AbayaStore.test/login/facebook/callback',
    ],
    'google' => [
        'client_id' => env('GOOGLE_API_KEY'),
        'client_secret' => env('GOOGLE_API_SECRET'),
        'redirect' => env('GOOGLE_CALLBACK_URL'),
    ],

    'twitter' => [
        'client_id' =>env('TWITTER_API_ID'),
        'client_secret' => env('TWITTER_API_SECRET'),
        'redirect' => env('TWITTER_CALLBACK_URL'),
    ],


];
