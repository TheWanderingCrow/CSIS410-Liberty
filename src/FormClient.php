<?php

namespace CrowCMS;

require __DIR__."/../vendor/autoload.php";

class FormClient {
    
    private $client;

    public function __construct() {
        $this->client = new \mysqli('localhost', 'root', 'potato', 'crowcms');
    }

    /**
     * Create a new ranker in the database, names do not need to be unique
     * 
     * @param fullname the full name of the ranker
     * 
     * @return int id of the ranker created
     */
    public function create_ranker($fullname) {
        // $this->client->exec("INSERT INTO ranker (fullname) VALUES (\"{$fullname}\");");
        $stmt = $this->client->prepare("INSERT INTO ranker (fullname) VALUES (?)");
        $stmt->execute([$fullname]);
        $res = $this->client->query("SELECT ranker_id FROM ranker WHERE fullname = \"{$fullname}\";");
        $res = $res->fetch_assoc();
        return $res['ranker_id'];
    }

    public function create_comment($ranker, $method, $comment) {
        // $this->client->exec("INSERT INTO comments (ranker_id, method, comment) VALUES (\"{$ranker}\", \"{$method}\", \"{$comment}\");");
        $stmt = $this->client->prepare("INSERT INTO comments (ranker_id, method, comment) VALUES (?, ?, ?)");
        $stmt->execute([$ranker, $method, $comment]);
    }

    /**
     * Register a new option value pair in the database for get requests
     * 
     * @param ranker id of the ranker
     * @param option the option (1, 2 or 3 in our case) that the ranker is voting for
     * @param value the value chosen for the option
     */
    public function getpoll($ranker, $option, $value) {
        // $this->client->exec("INSERT INTO getchoices (ranker_id, option, value) VALUES (\"{$ranker}\", \"{$option}\", \"{$value}\");");
        $stmt = $this->client->prepare("INSERT INTO getchoices (ranker_id, option, value) VALUES (?, ?, ?)");
        $stmt->execute([$ranker, $option, $value]);
    }

    /**
     * Register a new option value pair in the database for post requests
     * 
     * @param ranker id of the ranker
     * @param option the option (1, 2 or 3 in our case) that the ranker is voting for
     * @param value the value chosen for the option
     */
    public function postpoll($ranker, $option, $value) {
        // $ty = $this->client->exec("INSERT INTO postchoices (ranker_id, option, value) VALUES (\"{$ranker}\", \"{$option}\", \"{$value}\");");
        $stmt = $this->client->prepare("INSERT INTO postchoices (ranker_id, option, value) VALUES (?, ?, ?)");
        $stmt->execute([$ranker, $option, $value]);
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
                while ($row = $res->fetch_assoc()) {
                    array_push($rows, $row);
                }
                return $rows;
                break;
            case 'post':
                $res = $this->client->query("SELECT option, value FROM postchoices");
                $rows = [];
                while ($row = $res->fetch_assoc()) {
                    array_push($rows, $row);
                }
                return $rows;
                break;
            default:
                throw new \Exception("Error Processing Request", 1);
                break;
        }
    }

    public function fetchcomments($pollname) {
        switch ($pollname) {
            case 'get':
                $res = $this->client->query("SELECT ranker.fullname, comment FROM ranker JOIN comments on ranker.ranker_id = comments.ranker_id WHERE comments.method = \"get\";");
                $rows = [];
                while ($row = $res->fetch_assoc()) {
                    array_push($rows, $row);
                }
                return $rows;
                break;
            case 'post':
                $res = $this->client->query("SELECT ranker.fullname, comment FROM ranker JOIN comments on ranker.ranker_id = comments.ranker_id WHERE comments.method = \"post\";");
                $rows = [];
                while ($row = $res->fetch_assoc()) {
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