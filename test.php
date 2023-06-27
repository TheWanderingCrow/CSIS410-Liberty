<?php

require __DIR__."/vendor/autoload.php";
use CrowCMS\DatabaseController;


$client = new DatabaseController;

print_r($client->fetchComments());