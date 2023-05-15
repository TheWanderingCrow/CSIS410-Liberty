<?php

namespace CrowCMS;

class Design {
    public static function header() {
        $header = <<<HEREDOC
        <header>
            <header-text>CrowCMS</header-text>
        </header>
        HEREDOC;
        echo $header;
    }

    public static function footer() {
        $footer = <<<HEREDOC
        <footer>
            Copyright Patrick Menking 2023
        </footer>
        HEREDOC;
        echo $footer;
    }
}