<?php
require __DIR__."/../../vendor/autoload.php";
use CrowCMS\Design;
use CrowCMS\CartController;

$controller = new CartController;

Design::prelude();
Design::header();
$numCart = $_SESSION['cartCount'] ?? 0;
Design::navbar(['Cart: '.$numCart => '/index.php?p=cart']);

$items = $controller->fetch_items();
$rows = [];
foreach ($items as $item) {
    $template = <<<HEREDOC
    <tr>
        <td><img src="{$item['img']}" alt="{$item['title']}"/></td>
        <td>
            <div>
                <b>{$item['title']}</b><br>
                {$item['desc']}
            </div>
        </td>
        <td>{$item['price']}</td>
        <td><select name="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select></td>
        <input type="text" name="id" value="{$item['item_id']} hidden readonly/>
        <td><input type="submit" value="Add to Cart"/></td>
    </tr>
    HEREDOC;
    array_push($rows, $template);
}
?>

<body>
<div class="cart">
    <table>
        <form method="post">
            <?php echo implode('', $rows); ?>
        </form>
    </table>
</div>


<?php Design::footer(__FILE__);?>
</body>
</html>