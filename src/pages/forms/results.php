<?php
error_reporting(E_ALL ^ E_WARNING);
require __DIR__."/../../../vendor/autoload.php";

use CrowCMS\FormClient;
use CrowCMS\Design;

$client = new FormClient;
Design::prelude();
Design::header();

function handle_rows($rows) {
    $bin = [[]];
    
    foreach ($rows as $row) {
        $bin[$row['option']][$row['value']] += 1 ?? 0;
    }

    return $bin;
}

switch ($_GET['mode']) {
    case 'get':
        $rows = $client->fetchresults('get');
        $values = handle_rows($rows);
        break;
    
    case 'post':
        $rows = $client->fetchresults('post');
        $values = handle_rows($rows);
        break;

    default:
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        exit();
        break;
}

?>

<body>
    <div style="margin:auto;">
        <table class="org-table-head">
            <tr>
                <th>Votes</th>
                <th>TP-Link Archer AX55</th>
                <th>ASUS AX6000</th>
                <th>TP-Link AC1900</th>
            </tr>
            <tr>
                <td>1</td>
                <?php
                    $votes = [];

                    for ($i = 1; $i != 4; $i++) {
                            if (isset($values[$i][1])) {
                                array_push($votes, "<td>{$values[$i][1]}</td>");
                            } else {
                                array_push($votes, "<td>0</td>");
                            }
                        
                    }

                    echo implode("", $votes);
                ?>
            </tr>
            <tr>
                <td>2</td>
                <?php
                    $votes = [];

                    for ($i = 1; $i != 4; $i++) {
                            if (isset($values[$i][2])) {
                                array_push($votes, "<td>{$values[$i][2]}</td>");
                            } else {
                                array_push($votes, "<td>0</td>");
                            }
                        
                    }

                    echo implode("", $votes);
                ?>
            </tr>
            <tr>
                <td>3</td>
                <?php
                    $votes = [];

                    for ($i = 1; $i != 4; $i++) {
                            if (isset($values[$i][3])) {
                                array_push($votes, "<td>{$values[$i][3]}</td>");
                            } else {
                                array_push($votes, "<td>0</td>");
                            }
                        
                    }

                    echo implode("", $votes);
                ?>
            </tr>
            <tr>
                <td>4</td>
                <?php
                    $votes = [];

                    for ($i = 1; $i != 4; $i++) {
                            if (isset($values[$i][4])) {
                                array_push($votes, "<td>{$values[$i][4]}</td>");
                            } else {
                                array_push($votes, "<td>0</td>");
                            }
                        
                    }

                    echo implode("", $votes);
                ?>
            </tr>
            <tr>
                <td>5</td>
                <?php
                    $votes = [];

                    for ($i = 1; $i != 4; $i++) {
                            if (isset($values[$i][5])) {
                                array_push($votes, "<td>{$values[$i][5]}</td>");
                            } else {
                                array_push($votes, "<td>0</td>");
                            }
                        
                    }

                    echo implode("", $votes);
                ?>
            </tr>
                </table>
                </div>

                <?php Design::footer(__FILE__); ?>
                </body>
                </html>