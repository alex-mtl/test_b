<?php
return [
    '404' => [
        'route' => '404',
        'controller' => 'App\Controller\Page404',
        'method' => 'get'
    ],
    '/signup' => [
        'route' => 'signup',
        'controller' => 'App\Controller\Signup',
        'method' => 'get'
    ],
    '/test' => [
        'route' => 'test',
        'controller' => 'App\Controller\Tests',
        'method' => 'get'
    ],
    '/install' => [
        'route' => 'install',
        'controller' => 'App\Controller\Install',
        'method' => 'get'
    ],
];
