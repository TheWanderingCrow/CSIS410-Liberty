<?php

namespace CrowCMS;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class Loader {
    private $path;
    private $logger;
    public function __construct() {
        $this->path = null;
        $this->logger = new Logger('Loader');
        $this->logger->pushHandler(new StreamHandler(__DIR__."/../logs/log"), Level::Error);
    }

    public function load(String $pageName) {
        $this->path = __DIR__."/pages/".$pageName.".php";
        $this->logger->info("Loaded: ".$this->path);
        if (!file_exists($this->path)) {
            $this->path = __DIR__."/pages/404.php";
        }
    }

    public function render() {
        // echo the .html or .php page out to screen
        $this->logger->info("Rendering ".$this->path);
        include $this->path;
    }
}