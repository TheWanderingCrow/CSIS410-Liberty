<?php

require __DIR__."/../vendor/autoload.php";

use CrowCMS\Loader;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$loader = new Loader();
$logger = new Logger('Index');
$logger->pushHandler(new StreamHandler(__DIR__."/../logs/log"), Level::Info);


if (!isset($_GET["p"])) {
    $logger->info("Loading index.php");
    $loader->load("index");
    $loader->render();
} else {
    $page = $_GET["p"];
    $logger->info("Loading: ".$page);
    $loader->load($page);
    $loader->render();
}