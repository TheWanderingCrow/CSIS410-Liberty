<?php

namespace CrowCMS;

class Loader {
    private String $page;
    public function __construct() {
        $this->page = null;
    }

    public function load(String $pageName) {
        // load a template or page into the class
    }

    public function render() {
        // echo the .html or .php page out to screen
    }
}