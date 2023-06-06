<?php

require __DIR__."/../../../vendor/autoload.php";
use CrowCMS\Design;
use CrowCMS\ORGClient;
Design::prelude();

?>

<body>
    <?php
        Design::header();
        $employee_id = $_POST['employee'];
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
    <div>
        <p class="update-spacing-1">Edit employee:</p>
        <form action="/index.php?p=arrays%2Feditemployee" method="post">
            <p class="update-spacing-2" style="margin-left:2%;">Update existing</p>
            <span>
            <select class="update-spacing-2" name="update">
            <?php
                $options = [];
                foreach ($interests as $interest) {
                    $template = <<<HEREDOC
                    <option value="{$interest['type']}">{$interest['type']}</option>
                    HEREDOC;

                    array_push($options, $template);
                }
                echo implode("", $options);
            ?>
            </select>
            <input type="text" name="updateValue"/>
            <input type="text" name="employee_id" value="<?php echo $employee_id; ?>" hidden/>
            <input type="text" name="action" value="update" hidden/>
            <button type="submit">Update</button>
            </span>
        </form>
        <form action="/index.php?p=arrays%2Feditemployee" method="post">
            <p class="update-spacing-2" style="margin-left:2%;">Create new field</p>
            <span class="update-spacing-2">
            <input type=text" name="newField" required/>
            <input type="text" name="updateValue" required/>
            <input type="text" name="employee_id" value="<?php echo $employee_id; ?>" hidden/>
            <input type="text" name="action" value="new" hidden/>
            <button type="submit">Update</button>
            </span>
        </form>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>
</html>
