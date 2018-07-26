<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\Factory\IndexControllerFactory;
use Application\Controller\IndexController;
use Authorization\Service\AuthorizationService;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{
    const VERSION = '3.0.3-dev';

    public function OnBootstrap(MvcEvent $mvcEvent)
    {
        $eventManager = $mvcEvent->getApplication()->getEventManager();
        $container    = $mvcEvent->getApplication()->getServiceManager();

        $eventManager->attach(MvcEvent::EVENT_DISPATCH, function (MvcEvent $event) use ($container){
            $match = $event->getRouteMatch();
            /**
             * @var $authService AuthorizationService
             */
//            $authService = $container->get(AuthorizationService::class);
//
//            $authService->verifyResource();

        }, 10000);
    }


    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                IndexController::class  =>  IndexControllerFactory::class,
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [

        ];
    }
}
