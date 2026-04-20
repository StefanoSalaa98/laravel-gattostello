<?php
return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'https://gattostello.vercel.app'
    ],

    'allowed_headers' => ['*'],

    'supports_credentials' => false,
];

?>