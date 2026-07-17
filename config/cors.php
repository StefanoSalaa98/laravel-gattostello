<?php
return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        // '*'
        'http://localhost:5173',
        'https://gattostello.vercel.app',
        'https://gattostello.it',
        'https://www.gattostello.it'
    ],

    'allowed_headers' => ['*'],

    'supports_credentials' => false,
];

?>