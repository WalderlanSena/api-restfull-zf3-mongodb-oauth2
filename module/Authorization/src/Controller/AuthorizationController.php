<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 13:20
 */

namespace Authorization\Controller;

use Connection\Service\MongoService;
use MongoDB\Client;
use Zend\Mvc\Controller\AbstractActionController;
use OAuth2;
use MongoDB;

class AuthorizationController extends AbstractActionController
{
    private $mongoService;

    public function __construct(MongoService $mongoService)
    {
        $this->mongoService = $mongoService;
    }

    public function getAction()
    {
        try {
            $client = new MongoDB\Database('asaaaa','');
            $connection = new MongoDB($client,'db_superavalicao');
        } catch (\Exception $exception) {

        }

        $storage = new OAuth2\Storage\Mongo($connection);

        $server = new OAuth2\Server($storage);

        $server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage)); // or any grant type you like!

        $server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();

        echo json_encode([]);

        return $this->response;
    }
}