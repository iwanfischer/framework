<?php

$routes = [
    '/' => [
        'controller' => 'index',
        'action' => 'index'
    ],

    '/contracts' => [
        'controller' => 'contracts',
        'action' => 'contracts'
    ],

    '/create/form' => [
        'controller' => 'contracts',
        'action' => 'createForm'
    ],

    '/create' => [
        'controller' => 'contracts',
        'action' => 'create'

    ]
];
