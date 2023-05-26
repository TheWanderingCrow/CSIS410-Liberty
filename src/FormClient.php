<?php

namespace CrowCMS\FormClient;

require __DIR__."/../vendor/autoload.php";

class FormClient {
    
    private $client;

    public function __construct() {
        $this->client = new SQLite3(__DIR__."../forms.db");
    }

    public function create_ranker($fname, $lname) {
        
    }
}