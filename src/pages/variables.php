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

    <div>
        <form action="/index.php?p=database" method="post">
            <div class="comments">
                <h3>Leave a comment</h3>
                <label>Name: <input type="text" name="name" required/></label><br>
                <label>Title: <input type="text" name="title" style="margin-left: 17px;" required/></label><br>
                <label>Comment: <input type="text" name="comment" size="50" required/></label><br>
                <input type="submit" name="action" value="Submit Comment"/>
            </div>
        </form>
    </div>
    <div class="comments">
        <?php
        use CrowCMS\DatabaseController;

        $client = new DatabaseController();

        $rows = $client->fetchComments();

        $t = [];
        foreach ($rows as $row) {
            $posted_date = strval($row['commentdate']);
            $template = <<<HEREDOC
            <div>
                {$row['name']} - <b>{$row['title']}:</b><br>
                "{$row['comment']}"<br>
                Posted on: {$posted_date}<br><br>
            </div>
            HEREDOC;

            array_push($t, $template);
        }

        echo implode("", $t);
        ?>
    </div>

    <?php Design::footer(__FILE__); ?>
</body>
</html>