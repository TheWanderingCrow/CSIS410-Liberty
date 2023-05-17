<?php

require __DIR__."/../vendor/autoload.php";

use CrowCMS\Loader;
$loader = new Loader();

if (!isset($_GET["p"])) {
    $loader->load("index");
    $loader->render();
} else {
    $page = $_GET["p"];
    $loader->load($page);
    $loader->render();
}