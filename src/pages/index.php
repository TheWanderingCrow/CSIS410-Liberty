<?php
include __DIR__ . "/../../vendor/autoload.php";
use CrowCMS\Design;
Design::prelude();
?>


<body>
    <?php Design::header(); ?>
    <div>
        <p>Test</p>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>

</html>