<?php

require __DIR__."/../../vendor/autoload.php";
use CrowCMS\DatabaseController;

if (isset($_POST['action'])) {
    $client = new DatabaseController;
    $client->submitComment($_POST['name'], $_POST['title'], $_POST['comment']);
}

header("Location: /index.php?p=variables");
exit();