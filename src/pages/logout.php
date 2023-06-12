<?php

require __DIR__."/../../vendor/autoload.php";
use CrowCMS\Design;

Design::prelude();
Design::header();

session_unset();
session_destroy();
?>
<body>
<?php
    if (isset($_POST['value'])) {
        if ($_POST['value'] == 'Confirm') {
            session_unset();
            session_destroy();

            echo '<div style="margin-left:1%;"><p>You have been logged out</p></div>';
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $template = <<<'NOWDOC'
        <div>
            <p style="margin-left: 1%;">Please confirm your logout</p>
        </div>
        <div style="margin-left: 1%;">
            <form action="/index.php?p=logout" method="post">
                <input type="submit" value="Cancel" name="value"/>
                <input type="submit" value="Confirm" name="value"/>
            </form>
        </div>
        NOWDOC;
        echo $template;
    }
?>
</body>
<?php Design::footer(__FILE__);?>
</html>