<?php

namespace CrowCMS;

class Design {

    /**
     * Calling this function at the top of a web page to include the nessesary headers for Strict XHTML 1.0, along with our site meta and title
     * 
     * @return void
     */
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

    /**
     * Calling this function, typically right underneath the prelude, will generate our site header
     * 
     * @return void
     */
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

    /**
     * This function is typically called underneath the Design::header() function, this will generate a navigation bar with buttons to each page
     * 
     * @param array $args is a assosiative array of button values and links
     *                    ex. [
     *                          "About Us" => "/about",
     *                          "Contact Us" => "/contact"    
     *                        ]
     * 
     * @return void
     */
    public static function navbar(array $args) {
        $locs = [];
        foreach ($args as $name => $loc) {
            $tmp = '<li class="navbar-list"><a href="'.$loc.'" class="navbar-button">'.$name.'</a></li>';
            array_push($locs, $tmp);
        }
        $locs = implode("", $locs);
        $navbar = <<<HEREDOC
        <div class="navbar">
            <ul>
                {$locs}
            </ul>
        </div>
        HEREDOC;
        echo $navbar;
    }

    /**
     * Footer generates the site footer with our copyright information, XHTML and CSS stickers, and the date the page was last modified
     * 
     * @param $filePath is the path to the file, conventionally set to __FILE__
     * 
     * @return void
     */
    public static function footer($filePath) {
        date_default_timezone_set("EST");
        $dateLastModified = date('M d', filemtime($filePath));
        if ($_SESSION['authenticated']) {
            $logout = '<div class="footer-text"><a href="/index.php?p=logout"><button>Logout</button></a></div>';
        } else {
            $logout = '';
        }
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
                {$logout}
                <div class="last-edited"> Last Modified: {$dateLastModified}</div>
            </div>
        </div>
        HEREDOC;
        echo $footer;
    }

    public static function requires_authentication() {
        if (!$_SESSION['authenticated']) {
            $_SESSION['return'] = $_SERVER['HTTP_REFERER'] . "?p=" . $_GET['p'];
            header("Location: /index.php?p=sessions");
            exit();
        } else {
            return;
        }
    }
}