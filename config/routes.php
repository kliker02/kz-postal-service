<?php

return [
    'routes' => [
        [
            'pattern' => '/',
            'options' => [
                'controller' => \Aleksandr\KzPostal\Controllers\IndexController::class,
                'action'     => 'index',
            ],
        ],
        [
            'pattern' => '/details',
            'options' => [
                'controller' => \Aleksandr\KzPostal\Controllers\IndexController::class,
                'action'     => 'details',
            ],
        ]
    ]
];