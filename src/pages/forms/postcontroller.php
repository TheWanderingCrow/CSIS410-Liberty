<?php
require __DIR__."/../../../vendor/autoload.php";

use CrowCMS\FormClient;

$client = new FormClient;

$ranker_id = $client->create_ranker($_POST['fullname']);

// just do it three times since we only have three rows

$client->postpoll($ranker_id, '1', $_POST['postradio1']);
$client->postpoll($ranker_id, '2', $_POST['postradio2']);
$client->postpoll($ranker_id, '3', $_POST['postradio3']);

header("Location: http://crowcms.wanderingcrow.net/index.php?p=forms/results&mode=post");
exit();