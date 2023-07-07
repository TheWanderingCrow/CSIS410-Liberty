<?php
require __DIR__."/../../vendor/autoload.php";
use CrowCMS\Design;
use CrowCMS\CartController;

$controller = new CartController;

Design::prelude();
Design::header();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'Clear cart':
            unset($_SESSION['cart']);
            header("Location: /index.php?p=cms_sessions");
            exit();
            break;
        case 'Checkout':
            unset($_SESSION['cart']);
            echo "<p>You have successfully checked out</p>";
            exit();
        default:
            # code...
            break;
    }
}
print_r($_SESSION['cart']['items']);

if (isset($_POST['itemid'])) {
    $action = explode(":", $_POST['itemid']);
    try {
        foreach ($_SESSION['cart']['items'] as &$item) {
            if ($item['id'] == $action[1]) {
                switch ($action[0]) {
                    case 'updoot':
                        $specs = $controller->getCheckoutItem($item['id']);
                        $item['quantity'] += 1;
                        $_SESSION['cart']['total'] += floatval(preg_replace('/[^\d\.]+/', '', $specs['price']));
                        break;
                    case 'downdoot':
                        $specs = $controller->getCheckoutItem($item['id']);
                        $item['quantity'] -= 1;
                        $_SESSION['cart']['total'] -= floatval(preg_replace('/[^\d\.]+/', '', $specs['price']));
                        if ($item['quantity'] == 0) {
                            unset($item);
                        }
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }

}
?>
<body>
<style>
table, tr, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>

<div style="margin:1%;">
    <table>
        <?php
        if (count($_SESSION['cart']['items']) != 0) {
            $rows = [];
            echo <<<HEREDOC
            <tr>
                <td><b>Item</td>
                <td><b>Price</td>
                <td><b>Quantity</td>
                <td><b>Actions</td>
            </tr>
            HEREDOC;
            foreach ($_SESSION['cart']['items'] as $item) {
                $specs = $controller->getCheckoutItem($item['id']);
                $template = <<<HEREDOC
                <tr>
                    <td><b>{$specs['title']}</b></td>
                    <td>{$specs['price']}</td>
                    <td>{$item['quantity']}</td>
                    <td><form action="/index.php?p=cart" method="post"><button name="itemid" value="downdoot:{$item['id']}">-</button><button name="itemid" value="updoot:{$item['id']}">+</button></form></td>
                </tr>
                HEREDOC;
                array_push($rows, $template);
            }
            echo implode("", $rows);
            echo "<tr><td></td><td></td><td>Total: {$_SESSION['cart']['total']}</td></tr>";
        } else {
            echo "<p>Please add something to your cart first</p>";
        }
        ?>
    </table>
    <div>
        <form action="/index.php?p=cart" method="post">
            <input type="submit" name="action" value="Clear cart"/>
            <input type="submit" name="action" value="Checkout"/>
        </form>
    </div>
</div>


<?php Design::footer(__FILE__);?>
</body>
</html>