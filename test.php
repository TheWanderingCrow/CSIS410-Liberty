<?php

require __DIR__."/vendor/autoload.php";
use CrowCMS\UserClient;


$client = new UserClient;

print_r($client->login('admin', 'admin'));