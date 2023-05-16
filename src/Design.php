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
                <div class="validation-icons">
                    <p>
                        <a href="http://validator.w3.org/check?uri=referer"><img
                            src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
                        </a>

                        <a href="http://jigsaw.w3.org/css-validator/check/referer">
                            <img style="border:0;width:88px;height:31px"
                                src="http://jigsaw.w3.org/css-validator/images/vcss"
                                alt="Valid CSS!" />
                        </a>
                    </p>
                </div>
                <div class="footer-text">Copyright Patrick Menking 2023</div>
                <div class="last-edited"> Last Modified: {$dateLastModified}</div>
            </div>
        </div>
        HEREDOC;
        echo $footer;
    }
}