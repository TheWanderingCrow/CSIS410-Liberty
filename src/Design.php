<?php

namespace CrowCMS;

class Design {
    public static function header() {
        $header = <<<HEREDOC
        <div class="header">
            <h1>CrowCMS</h1>
        </div>
        HEREDOC;
        echo $header;
    }
}