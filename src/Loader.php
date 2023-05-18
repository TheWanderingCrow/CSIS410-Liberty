<?php

namespace CrowCMS;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class Loader {
    private $path;
    private $logger;

    /**
     * Constructs a new instance of the Loader
     */
    public function __construct() {
        $this->path = null;
        $this->logger = new Logger('Loader');
        $this->logger->pushHandler(new StreamHandler(__DIR__."/../logs/log"), Level::Error);
    }

    /**
     * Load a page into memory, also load 404 if the desired page is not found
     * 
     * @param String $pageName is the name of the page without .php
     *                         ex. foundations
     *                             foundations/info
     * @return void
     */
    public function load(String $pageName) {
        $this->path = __DIR__."/pages/".$pageName.".php";
        $this->logger->info("Loaded: ".$this->path);
        if (!file_exists($this->path)) {
            $this->path = __DIR__."/pages/404.php";
        }
    }

    /**
     * Render the currently loaded page
     * 
     * @return void
     */
    public function render() {
        // echo the .html or .php page out to screen
        $this->logger->info("Rendering ".$this->path);
        include $this->path;
    }
}