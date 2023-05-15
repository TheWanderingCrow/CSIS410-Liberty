<?php
include __DIR__ . "/../../vendor/autoload.php";
use CrowCMS\Design;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <link rel="stylesheet" href="/css/design.css" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>
        CSIS410 - CrowCMS
    </title>
</head>

<body>
    <div>
        <?php Design::header(); ?>
    </div>
    <p>Test</p>
    <div>
        <?php Design::footer(); ?>
    </div>
</body>

</html>