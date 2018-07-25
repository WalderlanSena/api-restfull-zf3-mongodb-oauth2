<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/07/18
 * Time: 12:49
 */

namespace Connection\Service;

use MongoDB\Client;

class MongoService
{
    public $client;
    public $database;

    public function __construct(String $database)
    {
        $this->client = new Client('mongodb://localhost:27017',
            [
                'socketTimeoutMS' => 1000000
            ]);
        $this->database = $this->client->$database;
    }
}