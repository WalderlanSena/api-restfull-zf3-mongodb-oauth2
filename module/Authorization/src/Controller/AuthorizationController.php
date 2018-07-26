<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 25/07/18
 * Time: 13:20
 */

namespace Authorization\Controller;

use Authorization\Service\AuthorizationService;
use Connection\Service\MongoService;
use Zend\Mvc\Controller\AbstractActionController;
use OAuth2;

class AuthorizationController extends AbstractActionController
{
    private $mongoService;
    private $server;
    private $authorizationService;

    public function __construct(MongoService $mongoService, AuthorizationService $authorizationService)
    {
        $this->mongoService = $mongoService;
        $storage            = new OAuth2\Storage\MongoDB($this->mongoService->database);
        $this->server       = new OAuth2\Server($storage);
        $this->server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
        $this->server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
        $this->authorizationService = $authorizationService;
    }

    public function getTokenAction()
    {
        $this->authorizationService->getToken();
        return $this->response;
    }

    public function resourceAction()
    {
        if (!$this->server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
            $this->server->getResponse()->send();
            die();
        }

        echo json_encode([
            'success' => true,
            'message' => 'Bem vindo a minha API!']
        );

        return $this->response;
    }

    public function authorizeAction()
    {
        $request = OAuth2\Request::createFromGlobals();
        $response = new OAuth2\Response();

        // validate the authorize request
        if (!$this->server->validateAuthorizeRequest($request, $response)) {
            $response->send();
            die;
        }

        // display an authorization form
        if (empty($_POST)) {
            exit('
                <form method="post">
                  <label>Do You Authorize TestClient?</label><br />
                  <input type="submit" name="authorized" value="yes">
                  <input type="submit" name="authorized" value="no">
                </form>');
        }

        // print the authorization code if the user has authorized your client
        $is_authorized = ($_POST['authorized'] === 'yes');

        $this->server->handleAuthorizeRequest($request, $response, $is_authorized);

        if ($is_authorized) {
            // this is only here so that you get to see your code in the cURL request. Otherwise, we'd redirect back to the client
            $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
            exit("SUCCESS! Authorization Code: $code");
        }

        $response->send();

        return $this->response;
    }
}