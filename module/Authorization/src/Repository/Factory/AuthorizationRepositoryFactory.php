<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 13:28
 */

namespace Authorization\Repository\Factory;

use Authorization\Repository\AuthorizationRepository;
use Connection\Service\MongoService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthorizationRepositoryFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AuthorizationRepository|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mongo = new MongoService($container->get('config')['database']);

        return new AuthorizationRepository(
            $mongo
        );
    }
}