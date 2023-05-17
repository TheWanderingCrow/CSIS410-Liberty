<?php

namespace CrowCMS;

class Loader {
    private $path;
    public function __construct() {
        $this->path = null;
    }

    public function load(String $pageName) {
        $this->path = __DIR__."/pages/".$pageName.".php";
        if (!file_exists($this->path)) {
            $this->path = __DIR__."/pages/404.php";
        }
    }

    public function render() {
        // echo the .html or .php page out to screen
        include $this->path;
    }
}