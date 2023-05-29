<?php

namespace CrowCMS\FormClient;

require __DIR__."/../vendor/autoload.php";

class FormClient {
    
    private $client;

    public function __construct() {
        $this->client = new SQLite3(__DIR__."../forms.db");
    }

    public function create_ranker($fullname) {
        $this->client->exec("INSERT INTO ranker (fullname) VALUES ({$fullname});");
        $res = $this->client->query("SELECT id FROM ranker WHERE fullname = {$name};");
        $res = $res->fetchArray(SQLITE3_ASSOC);
        return $res['id'];
    }

    public function getpoll($ranker, $option, $value) {
        $this->client->exec("INSERT INTO getchoices (ranker_id, option, value) VALUES ({$ranker}, {$option}, {$value});");
    }

    public function postpoll($ranker, $option, $value) {
        $this->client->exec("INSERT INTO postchoices (ranker_id, option, value) VALUES ({$ranker}, {$option}, {$value});");
    }

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