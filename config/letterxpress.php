<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API URL
    |--------------------------------------------------------------------------
    |
    | This is the endpoint URL to the LetterXpress API.
    |
    | Production: https://api.letterxpress.de/v1/
    | Sandbox:    https://sandbox.letterxpress.de/v1/
    |
    */

    'api_url' => env('LETTER_XPRESS_API_URL', 'https://api.letterxpress.de/v1/'),

    /*
    |--------------------------------------------------------------------------
    | API username
    |--------------------------------------------------------------------------
    |
    | This is the username of your LetterXpress account.
    |
    */

    'api_user' => env('LETTER_XPRESS_API_USER'),

    /*
    |--------------------------------------------------------------------------
    | API key
    |--------------------------------------------------------------------------
    |
    | This is your personal API key.
    |
    */

    'api_key' => env('LETTER_XPRESS_API_KEY'),

];
