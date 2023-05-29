<?php
require __DIR__."/../../../vendor/autoload.php";

use CrowCMS\FormClient;

$client = new FormClient();

$ranker_id = $client->create_ranker($_GET['fullname']);

// just do it three times since we only have three rows

$client->postpoll($ranker_id, '1', $_GET['getradio1']);
$client->postpoll($ranker_id, '2', $_GET['getradio2']);
$client->postpoll($ranker_id, '3', $_GET['getradio3']);

header("Location: https://crowcms.wanderingcrow.net/index.php?p=forms/results");
exit();

