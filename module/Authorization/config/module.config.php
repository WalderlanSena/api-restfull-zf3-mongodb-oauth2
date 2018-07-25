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

            'auth-code' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/auth-code',
                    'defaults' => [
                        'controller' => AuthorizationController::class,
                        'action' => 'get'
                    ],
                ],
            ],

        ],
    ],
];