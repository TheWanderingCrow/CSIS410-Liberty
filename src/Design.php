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
}