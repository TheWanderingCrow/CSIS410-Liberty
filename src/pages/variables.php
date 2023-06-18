<?php

require __DIR__."/../../vendor/autoload.php";

use CrowCMS\Design;
use CrowCMS\ORGClient;
$client = new ORGClient;
Design::requires_authentication('customer');
Design::prelude();
?>

<body>
    <?php 
        Design::header(); 
        $employees = $client->get_employees();
        $rows = [];
        foreach ($employees as $employee) {
            $template = <<<HEREDOC
            <th class="org-table-body">
                <a href="/index.php?p=variables/info&eid={$employee['employee_id']}&ename={$employee['fname']} {$employee['lname']}">
                    {$employee['fname']} {$employee['lname']}
                </a>
            </th>
            HEREDOC;

            array_push($rows, $template);
        }
    ?>
    <div>
        <table class="org-table-head">
            <tr class="org-table-edge">
                <?php echo implode("", $rows); ?>
            </tr>
        </table>
    </div>

    <?php Design::footer(__FILE__); ?>
</body>
</html>