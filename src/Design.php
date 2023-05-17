<?php

namespace CrowCMS;

class Design {

    public static function prelude() {
        $prelude = <<<HEREDOC
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

        <head>
            <link rel="stylesheet" href="/css/design.css" type="text/css" media="all"/>
            <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
            <title>
                CSIS410 - CrowCMS
            </title>
        </head>
        HEREDOC;
        echo $prelude;
    }

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
        $dateLastModified = date('M d', filemtime($filePath));
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