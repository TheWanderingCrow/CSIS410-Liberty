<?php

require __DIR__."/../vendor/autoload.php";

use CrowCMS\Loader;
$loader = new Loader();

if (!isset($_GET["p"])) {
    $loader->load("index");
    $loader->render();
} else {
    $path = $_GET["p"];
}