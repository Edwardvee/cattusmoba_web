<?php

return [
    'routes' => [
        'api.frontend' => [
            '/api/frontend/user/' => 'api.frontend.user'
            // Agrega todas las rutas del grupo frontend que necesites
        ]
    ],
    'groups' => [
        'api.frontend.user' => [
            'frontend/user/{name}/{page}'
        ]
    ],
    'aliases' => [
        'admin_users' => 'admin/admin_users',
    ],
];
