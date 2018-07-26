<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 25/07/18
 * Time: 13:13
 */

namespace Authorization;

use Authorization\Controller\AuthorizationController;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [

            'oauth2-token' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/token',
                    'defaults' => [
                        'controller' => AuthorizationController::class,
                        'action' => 'getToken'
                    ],
                ],
            ],

            'oauth2-resource' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/recurso',
                    'defaults' => [
                        'controller' => AuthorizationController::class,
                        'action' => 'resource'
                    ],
                ],
            ],


            'oauth2-authorize' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/autorizar',
                    'defaults' => [
                        'controller' => AuthorizationController::class,
                        'action' => 'authorize'
                    ],
                ],
            ],

        ],
    ],
];