<?php
include __DIR__ . "/../../vendor/autoload.php";
use CrowCMS\Design;
Design::prelude();
?>


<body>
    <?php Design::header(); ?>
    <div class="body-text">
        <h1>Main Menu</h1>
        <p><a href="/index.php?p=foundations">Module 1: Week 1 Foundations</a></p>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>

</html>