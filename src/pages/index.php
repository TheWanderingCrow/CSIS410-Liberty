<?php
require __DIR__ . "/../../vendor/autoload.php";
use CrowCMS\Design;
Design::prelude();
?>


<body>
    <?php Design::header(); ?>
    <div class="body-text">
        <h1>Main Menu</h1>
        <p><a href="/index.php?p=foundations">Module 1: Week 1 Foundations</a></p>
        <p><a href="/index.php?p=variables">Module 1: Week 1 Variables</a></p>
        <p><a href="/index.php?p=forms">Module 2: Week 2 Forms</a></p>
        <p><a href="/index.php?p=arrays">Module 3: Week 3 Arrays</a></p>
        <p><a href="/index.php?p=sessions">Module 4: Week 4 Sessions</a></p>
        <p><a href="/index.php?p=cms_sessions">Module 5: Week 5 CMS Sessions</a></p>
        <p><a href="/index.php?p=database">Module 6: Week 6 Database</a></p>
        <p><a href="/index.php?p=cms_sessions">Module 8: Week 8 CMS Database</a></p>
        <p><a href="/index.php?p=admin_manage">CMS Account Management</a></p>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>

</html>