<?php

namespace CrowCMS;

class Design {
    public static function header() {
        $header = <<<HEREDOC
        <div>
            <header>
                <header-text>CrowCMS</header-text>
            </header>
        </div>
        HEREDOC;
        echo $header;
    }

    public static function footer($filePath) {
        date_default_timezone_set("EST");
        $dateLastModified = date('D \of M \a\t g\:i\:s A \E\S\T', filemtime($filePath));
        $footer = <<<HEREDOC
        <div>
            <footer>
                <footer-text>Copyright Patrick Menking 2023</footer-text>
                <last-edited> Last Modified: {$dateLastModified}</last-edited>
            </footer>
        </div>
        HEREDOC;
        echo $footer;
    }
}