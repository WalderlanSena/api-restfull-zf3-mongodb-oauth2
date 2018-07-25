<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 12:49
 */

namespace Connection\Service\Factory;

use Connection\Service\MongoService;
use Interop\Container\ContainerInterface;
use MongoDB\Client;
use Zend\ServiceManager\Factory\FactoryInterface;

class MongoServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return MongoService|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mongo = $container->get('config')['database']['mongodb']['name'];

        return new MongoService(
            $mongo
        );
    }
}