<?php

require __DIR__."/../../../vendor/autoload.php";
use CrowCMS\Design;
use CrowCMS\ORGClient;
Design::requires_authentication('customer');
Design::prelude();

?>

<body>
    <?php
        Design::header();
        $employee_id = $_GET['eid'];
        $client = new ORGClient;
        $infos = $client->get_employee_info($employee_id);
    ?>
    <div>
        <table class="org-table-head">
            <tr><th><?php echo $_GET['ename']?></th></tr>
            <tr>
                <th><img src="<?php echo $client->get_employee_image($employee_id)?>" class="portrait"></img></th>
            </tr>
            <?php
                $interests = $client->get_employee_info($employee_id);
                $rows = [];
                foreach ($interests as $interest) {
                    $template = <<<HEREDOC
                    <tr><th style="font-weight:normal;">{$interest['type']}: {$interest['blurb']}</th></tr>
                    HEREDOC;

                    array_push($rows, $template);
                }
                echo implode("", $rows);
            ?>
        </table>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>
</html>
