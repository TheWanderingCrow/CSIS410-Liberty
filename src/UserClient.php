<?php

namespace CrowCMS;

require __DIR__ . "/../vendor/autoload.php";


class UserClient {
    private $client;
    public $result;
    public $error;

    /**
     * Create a database client
     * 
     * @return void;
     */
    public function __construct() {
        $this->client = new \mysqli('localhost', 'root', 'potato', 'crowcms');
    }

    public function login($username, $password) {
        $res = $this->client->query("SELECT password FROM user WHERE username = \"{$username}\" LIMIT 1");
        if(!$res) { echo "REEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE"; }
        $res = $res->fetch_assoc();
        if ($res['password'] == $password) {
            return $res['accesslevel'];
        } else {
            return false;
        }
    }

    public function addUser($username, $password) {
        $stmt = $this->client->prepare("INSERT INTO user");
    }
}