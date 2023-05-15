<?php

namespace CrowCMS;

class Loader {
    private String $page;
    public function __construct() {
        $this->page = null;
    }

    public function load(String $pageName) {
        $path = __DIR__."/pages/".$pageName;
        $fp = fopen($path, 'r');
        $this->page = fread($fp, filesize($path));
    }

    public function render() {
        // echo the .html or .php page out to screen
        echo $this->page;
    }
}