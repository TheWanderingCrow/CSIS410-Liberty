<?php
require __DIR__."/../../vendor/autoload.php";
use CrowCMS\Design;
use CrowCMS\UserClient;

$client = new UserClient;

Design::requires_authentication('admin');
Design::prelude();
Design::header();

if (isset($_POST['action'])) {
    if ($_POST['action'] == "createUser") {
        $client->addUser($_POST['username'], $_POST['password'], $_POST['accesslevel']);
    }

    if ($_POST['action'] == "deleteUser") {
        $client->delUser($_POST['user']);
    }
}
?>

<body>

<div>
    <h3>Create a new user</h3>
    <form action="/index.php?p=admin_manage" method="post">
        <div style="margin: 1%;"><label>Username: <input type="text" name="username"/></label></div>
        <div style="margin: 1%;"><label>Password: <input type="password" name="password"/></label></div>
        <div style="margin: 1%;"><label>Access Level: <select name="accesslevel">
            <option value="customer">Customer</option>
            <option value="publisher">Publisher</option>
            <option value="admin">Admin</option>
        </select>
        <input type="text" name="action" value="createUser" hidden/>
        <div style="margin: 1%;"><input type="submit" value="Add User"/></div>
    </form>
</div>

<div>
    <h3>Manage accounts</h3>
    <?php
        $res = $client->listUsers();
        $rows = [];
        foreach ($res as $user) {
            $template = <<<HEREDOC
            <form action="/index.php?p=admin_manage" method="post">
            <input type="text" name="action" value="deleteUser" hidden/>
            <input type="text" name="user" value="{$user['username']}" hidden/>
            <span><p style="margin: 1%;">{$user['username']}<button type="submit" style="margin:1%;">Delete</button></p></span>
            </form>
            HEREDOC;
            array_push($rows, $template);
        }
        echo implode('', $rows);
    ?>


<?php Design::footer(__FILE__);?>
</body>
</html>