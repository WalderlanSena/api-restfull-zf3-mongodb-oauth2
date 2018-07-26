<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 13:26
 */

namespace Authorization\Service\Factory;

use Authorization\Service\AuthorizationService;
use Connection\Service\MongoService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use OAuth2;

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
        $storage = new OAuth2\Storage\MongoDB($container->get(MongoService::class)->database);
        $server  = new OAuth2\Server($storage);
        $server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
        $server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));

        return new AuthorizationService(
            $server
        );
    }
}