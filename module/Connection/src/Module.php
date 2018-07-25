<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 12:48
 */

namespace Connection;

use Connection\Service\Factory\MongoServiceFactory;
use Connection\Service\MongoService;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface
{
    public function getConfig()
    {
        return [];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                MongoService::class => MongoServiceFactory::class,
            ],
        ];
    }
}