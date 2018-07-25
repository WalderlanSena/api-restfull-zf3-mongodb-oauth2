<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 13:25
 */

namespace Authorization\Service;

use Authorization\Repository\AuthorizationRepository;
use OAuth2;

class AuthorizationService
{
    private $authorizationRepository;

    public function __construct(AuthorizationRepository $authorizationRepository)
    {
        $this->authorizationRepository = $authorizationRepository;
    }

    /**
     * @throws \Exception
     */
    public function addGranType()
    {
        try {
            $mongo = new \MongoClient();
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        $storage = new OAuth2\Storage\Mongo($mongo);

        $storage->setClientDetails('','','');
    }
}