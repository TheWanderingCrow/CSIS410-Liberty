<?php

require __DIR__ . "/../../vendor/autoload.php";

use CrowCMS\Design;
Design::prelude();
Design::header();

if (!isset($_SESSION['willkommen'])) {
    $_SESSION['willkommen'] = "Please login:";
}

if ($_SESSION['authenticated'] == "true") {
    echo "You are already logged in";
    exit();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == "customer" && $_POST['password'] == "customer") {
        $_SESSION['authenticated'] == "true";
        unset($_SESSION['willkommen']);
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $_SESSION['willkommen'] = "User/Password incorrect, please try again:";
    }
}

?>

<body>
    <div style="margin: 1%;">
        <div><h2><?php echo $_SESSION['willkommen']; ?></h2></div>
        <div>
            <form action="/index.php?p=sessions" method="post">
                <div style="margin: 1%;"><label>Username: <input type="text" name="username"/></label></div>
                <div style="margin: 1%;"><label>Password: <input type="password" name="password"/></label></div>
                <div style="margin: 1%;"><input type="submit" value="Login"/></div>
            </form>
        </div>
    </div>
</body>
</html>