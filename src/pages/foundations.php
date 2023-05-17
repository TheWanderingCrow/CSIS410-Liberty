<?php
include __DIR__ . "/../../vendor/autoload.php";
use CrowCMS\Design;
Design::prelude();
?>

<body>
    <?php Design::header();?>


    <?php Design::footer(__FILE__);?>
</body>
</html>