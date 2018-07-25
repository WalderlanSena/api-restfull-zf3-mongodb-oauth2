<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 13:26
 */

namespace Authorization\Service\Factory;

use Authorization\Repository\AuthorizationRepository;
use Authorization\Service\AuthorizationService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthorizationServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AuthorizationService|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AuthorizationService(
            $container->get(AuthorizationRepository::class)
        );
    }
}