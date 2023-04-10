<?php

return [
    'routes' => [
        'frontend' => [
            '/frontend/user/' => 'frontend.user'
            // Agrega todas las rutas del grupo frontend que necesites
        ]
    ],
    'groups' => [
        'frontend' => [
            'frontend/',
            "frontend.user"
        ],
        'frontend.user' => [
            'frontend/user/{name}/{page}'
        ]
    ],
];
