<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 13:22
 */

namespace Authorization;

use Authorization\Controller\AuthorizationController;
use Authorization\Controller\Factory\AuthorizationControllerFactory;
use Authorization\Service\AuthorizationService;
use Authorization\Service\Factory\AuthorizationServiceFactory;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                AuthorizationController::class  =>  AuthorizationControllerFactory::class,
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                AuthorizationService::class     =>  AuthorizationServiceFactory::class,
            ],
        ];
    }
}