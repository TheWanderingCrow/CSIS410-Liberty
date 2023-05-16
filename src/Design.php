<?php

namespace CrowCMS;

class Design {
    public static function header() {
        $header = <<<HEREDOC
        <div>
            <div class="header">
                <div class="header-text">CrowCMS</div>
            </div>
        </div>
        HEREDOC;
        echo $header;
    }

    public static function footer($filePath) {
        date_default_timezone_set("EST");
        $dateLastModified = date('D \of M \a\t g\:i\:s A \E\S\T', filemtime($filePath));
        $footer = <<<HEREDOC
        <div>
            <div class="footer">
                <div class="footer-text">Copyright Patrick Menking 2023</div>
                <div class="last-edited"> Last Modified: {$dateLastModified}</div>
            </div>
        </div>
        HEREDOC;
        echo $footer;
    }
}