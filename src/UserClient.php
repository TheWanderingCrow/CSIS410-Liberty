<?php

namespace CrowCMS;

require __DIR__ . "/../vendor/autoload.php";


class UserClient {
    private \SQLite3 $client;
    public \SQlite3Result $result;
    public $error;

    /**
     * Create a database client
     * 
     * @return void;
     */
    public function __construct() {
        $this->client = new \SQLite3(__DIR__.'/../users.db');
    }

    public function login($username, $password) {
        $res = $this->client->query("SELECT password FROM user WHERE username = \"{$username}\" LIMIT 1");
        if(!$res) { echo "REEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE"; }
        $res = $res->fetchArray(SQLITE3_ASSOC);
        if ($res['password'] == $password) {
            return true;
        } else {
            return false;
        }
    }
}