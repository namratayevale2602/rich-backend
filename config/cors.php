<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'csrf-token'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'http://localhost:3000',
        'http://127.0.0.1:3000',
        'http://richlearnhub.com',
        'https://richlearnhub.com',
        'http://www.richlearnhub.com',
        'https://www.richlearnhub.com',
        'http://richsol.com',
        'https://richsol.com',
        'http://www.richsol.com',
        'https://www.richsol.com',
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];