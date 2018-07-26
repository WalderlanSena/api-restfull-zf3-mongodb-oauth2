<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 25/07/18
 * Time: 13:25
 */

namespace Authorization\Service;

use OAuth2;

class AuthorizationService
{
    private $server;

    public function __construct(OAuth2\Server $server)
    {
        $this->server = $server;
    }

    public function getToken()
    {
        return $this->server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
    }

    public function verifyResource()
    {
        if (!$this->server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
            $this->server->getResponse()->send();
            die();
        }
    }

}