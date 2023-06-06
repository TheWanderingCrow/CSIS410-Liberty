<?php

require __DIR__."/../../../vendor/autoload.php";

use CrowCMS\ORGClient;
$client = new ORGClient;


switch ($_POST['action']) {
    case 'update':
        $client->update_employee_info($_POST['employee_id'], $_POST['update'], $_POST['updateValue']);
        break;
    case 'new':
        $client->add_new_field($_POST['employee_id'], $_POST['newField'], $_POST['updateValue']);
        break;
    default:
        throw new \Exception("Error processing request");
        break;
}

header("Location: http://crowcms.wanderingcrow.net/index.php?p=variables/info?eid=\"{$_POST['employee_id']}\"&ename=''");
exit();