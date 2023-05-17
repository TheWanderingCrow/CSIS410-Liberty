<?php
include __DIR__."/../../vendor/autoload.php";
use CrowCMS;
Design::prelude();
?>

<body>
    <?php Design::header(); ?>
    <div class="body-text">
        <h1>Main Menu</h1>
        <p><a href="/index.php?p=foundations/about.php">About Us</a></p>
        <p><a href="/index.php?p=foundations/info.php">phpinfo();</a></p>
        <p><a href="/index.php?p=foundations/contact.php">Contact Us</a></p>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>

</html>