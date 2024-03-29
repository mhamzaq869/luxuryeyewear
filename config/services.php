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
    'github' => [
        'client_id' => '24fbd0edd46019058da7', //Github API
        'client_secret' => '4500e6ab7a9bb70608600fbdee37969276bb0685', //Github Secret
        'redirect' => '/login/github/callback',
     ],
     'google' => [
        'client_id' => '962215902557-21bn4968vb4r50ub8ao8grj5uhmaicrn.apps.googleusercontent.com', //Google API
        'client_secret' => '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', //Google Secret
        'redirect' => 'https://luxuriousonly.com/login/google',
     ],
     'facebook' => [
        'client_id' => '1494792524037846', //Facebook API
        'client_secret' => '1bf13c2faf680f4ae2b97bdafa92c7d2', //Facebook Secret
        'redirect' => '/login/facebook/callback',
     ],

];
