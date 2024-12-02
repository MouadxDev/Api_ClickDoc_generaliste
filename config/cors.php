<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'http://localhost:42080',  // Specific frontend URL
        'http://127.0.0.1:42080'   // Add variations if needed
    ],
    'allowed_headers' => ['*'],
    'supports_credentials' => true  // Important for authentication
];
