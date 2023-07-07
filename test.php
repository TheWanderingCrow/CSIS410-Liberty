<?php

require __DIR__."/vendor/autoload.php";
use CrowCMS\FormClient;


$client = new FormClient;

print_r($client->fetchresults('get'));