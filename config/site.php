<?php

use Illuminate\Support\Facades\Facade;

return [
    'momo' => [
        'access_token' => env('MOMO_ACCESS_TOKEN'),
        'secret_token' => env('MOMO_SECRET_TOKEN'),
        'api_endpoint' => env('API_ENDPOINT'),
        'pathner_code' => env('PATHNER_CODE'),
    ],
    'status' => [
        'charge' => 'charged',
        'uncharged' => 'uncharged',
    ]
];
