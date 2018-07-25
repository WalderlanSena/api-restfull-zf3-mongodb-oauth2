<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 13:27
 */

namespace Authorization\Repository;

use Connection\Service\MongoService;

class AuthorizationRepository
{
    private $collection;

    public function __construct(MongoService $mongoService)
    {
        $this->collection = $mongoService->database->selectCollection('authcodes');
    }

    /**
     * @throws \Exception
     */
    public function addGrantType()
    {
        try {
//            $response = $this->collection->
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}