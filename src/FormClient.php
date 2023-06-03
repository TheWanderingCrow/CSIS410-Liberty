<?php

namespace CrowCMS;

require __DIR__."/../vendor/autoload.php";

class FormClient {
    
    private $client;

    public function __construct() {
        $this->client = new \SQLite3(__DIR__."/../forms.db");
    }

    /**
     * Create a new ranker in the database, names do not need to be unique
     * 
     * @param fullname the full name of the ranker
     * 
     * @return int id of the ranker created
     */
    public function create_ranker($fullname) {
        $this->client->exec("INSERT INTO ranker (fullname) VALUES (\"{$fullname}\");");
        $res = $this->client->query("SELECT ranker_id FROM ranker WHERE fullname = \"{$fullname}\";");
        $res = $res->fetchArray(SQLITE3_ASSOC);
        return $res['ranker_id'];
    }
    /**
     * Register a new option value pair in the database for get requests
     * 
     * @param ranker id of the ranker
     * @param option the option (1, 2 or 3 in our case) that the ranker is voting for
     * @param value the value chosen for the option
     */
    public function getpoll($ranker, $option, $value) {
        $this->client->exec("INSERT INTO getchoices (ranker_id, option, value) VALUES (\"{$ranker}\", \"{$option}\", \"{$value}\");");
    }

    /**
     * Register a new option value pair in the database for post requests
     * 
     * @param ranker id of the ranker
     * @param option the option (1, 2 or 3 in our case) that the ranker is voting for
     * @param value the value chosen for the option
     */
    public function postpoll($ranker, $option, $value) {
        $ty = $this->client->exec("INSERT INTO postchoices (ranker_id, option, value) VALUES (\"{$ranker}\", \"{$option}\", \"{$value}\");");
    }

    /**
     * Fetch the results from either the post or get forums
     * 
     * @param pollname either get or post
     * 
     * @return array of rows that are key/value pair
     */
    public function fetchresults($pollname) {
        switch ($pollname) {
            case 'get':
                $res = $this->client->query("SELECT option, value FROM getchoices");
                $rows = [];
                while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
                    array_push($rows, $row);
                }
                return $rows;
                break;
            case 'post':
                $res = $this->client->query("SELECT option, value FROM postchoices");
                $rows = [];
                while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
                    array_push($rows, $row);
                }
                return $rows;
                break;
            default:
                throw new \Exception("Error Processing Request", 1);
                break;
        }
    }
}