<?php

namespace CrowCMS;

class Loader {
    private $page;
    public function __construct() {
        $this->page = null;
    }

    public function load(String $pageName) {
        $path = __DIR__."/pages/".$pageName;
        if (!file_exists($path)) {
            throw new Exception("File not Found");
        }
        $fp = fopen($path, 'r');
        $this->page = fread($fp, filesize($path));
    }

    public function render() {
        // echo the .html or .php page out to screen
        echo $this->page;
    }
}