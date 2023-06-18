<?php
require __DIR__."/../../vendor/autoload.php";
use CrowCMS\Design;
use CrowCMS\ORGClient;

$client = new ORGClient;

Design::requires_authentication('customer');
Design::prelude();
Design::header();
?>

<body>
    <p style="margin-left:1%;">Select employee to edit:</p>
    <form style="margin:5%;" action="/index.php?p=arrays%2Femployeepage" method="post">
        <select name="employee">
            <?php
                $employees = $client->get_employees();
                $options = [];
                foreach ($employees as $employee) {
                    $template = <<<HEREDOC
                    <option value="{$employee['employee_id']}">{$employee['fname']} {$employee['lname']}</option>
                    HEREDOC;
                    array_push($options, $template);
                }

                echo implode("", $options);
            ?>
        </select>
        <input type="submit" value="Select"/>
    </form>


<?php Design::footer(__FILE__);?>
</body>
</html>