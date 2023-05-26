<?php
require __DIR__."/../../../vendor/autoload.php";
use CrowCMS\Design;
Design::prelude();
?>
<body>
    <?php Design::header(); ?>
    <?php Design::navbar([
        "Main Menu" => "/index.php?p=foundations",
        "About Us" => "/index.php?p=foundations/about",
        "phpinfo();" => "/index.php?p=foundations/info",
        "Contact Us" => "/index.php?p=foundations/contact"
    ]); ?>
<?php phpinfo();?>
</body>
</html>
