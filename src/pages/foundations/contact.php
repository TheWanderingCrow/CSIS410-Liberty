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
        <h1>Contact Us</h1>
        <p>
            Thank you for your interest in TechGear. We value your feedback and are here to assist you. Please feel free to reach out to us using the contact information provided below:
            <br><br>
            Customer Support:<br>
            Email: support@TechGear.com<br>
            Phone: +1 (XXX) XXX-XXXX
            <br><br>
            Sales Inquiries:<br>
            Email: sales@TechGear.com<br>
            Phone: +1 (XXX) XXX-XXXX
            <br><br>
            Business Partnerships:<br>
            Email: partnerships@TechGear.com<br>
            Phone: +1 (XXX) XXX-XXXX
            <br><br>
            Address:<br>
            TechGear Headquarters<br>
            1234 Technology Avenue<br>
            Silicon Valley, CA 12345<br>
            United States
        </p>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>
</html>