<?php

namespace CrowCMS;

class Design {
    public static function header() {
        $header = <<<HEREDOC
        <header>
            <h1>CrowCMS</h1>
        </header>
        HEREDOC;
        echo $header;
    }
}