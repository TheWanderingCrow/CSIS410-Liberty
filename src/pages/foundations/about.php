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
    <div style="padding:1%;">
        <h1>Who are we</h1>
        <p>
            Welcome to TechGear, your ultimate destination for cutting-edge technology! 
            As a leading online retailer, we specialize in high-end networking and server equipment, delivering quality products and exceptional service worldwide. 
            Our vision is to be the global leader in providing best-of-breed services and solutions for enterprise, governmental, and individual IT needs. 
            <br><br>Explore our extensive product line, featuring servers, networking equipment, memory modules, motherboards, CPUs, graphics cards, peripherals, printers, and more from renowned brands like Intel®, AMD™, Microsoft®, Cisco®, and others. 
            We constantly update our website with the latest products, so check back frequently for new arrivals. Shop with us and experience excellence in online technology shopping! 
        </p>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>
</html>
