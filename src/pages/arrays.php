<?php
require __DIR__."/../../vendor/autoload.php";
use CrowCMS\Design;
use CrowCMS\FormClient;

$client = new FormClient;

Design::prelude();
?>

<body>





<?php Design::footer(__FILE__);?>
</body>
</html>