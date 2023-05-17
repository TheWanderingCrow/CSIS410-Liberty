<?php
include __DIR__."/../../vendor/autoload.php";
use CrowCMS\Design;
Design::prelude();
?>

<body>
    <?php Design::header(); ?>
    <div class="body-text">
        <h1>Main Menu</h1>
        <p><a href="/index.php?p=foundations/about">About Us</a></p>
        <p><a href="/index.php?p=foundations/info">phpinfo();</a></p>
        <p><a href="/index.php?p=foundations/contact">Contact Us</a></p>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>

</html>