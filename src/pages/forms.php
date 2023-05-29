<?php

require __DIR__."/../../vendor/autoload.php";

use CrowCMS\Design;

Design::prelude();
?>

<body>
    <?php Design::header(); ?>
    <div>
        <form action="index.php" method="get">
        <div>
            <span>
                <label class="radio-label"><input type="radio" name="getradio1" value="1" class="radio-input"/>1</label>
                <label class="radio-label"><input type="radio" name="getradio1" value="2" class="radio-input"/>2</label>
                <label class="radio-label"><input type="radio" name="getradio1" value="3" class="radio-input"/>3</label>
                <label class="radio-label"><input type="radio" name="getradio1" value="4" class="radio-input"/>4</label>
                <label class="radio-label"><input type="radio" name="getradio1" value="5" class="radio-input"/>5</label>
            </span>
        </div>
        <div>
            <span>
                <label class="radio-label"><input type="radio" name="getradio2" value="1" class="radio-input"/>1</label>
                <label class="radio-label"><input type="radio" name="getradio2" value="2" class="radio-input"/>2</label>
                <label class="radio-label"><input type="radio" name="getradio2" value="3" class="radio-input"/>3</label>
                <label class="radio-label"><input type="radio" name="getradio2" value="4" class="radio-input"/>4</label>
                <label class="radio-label"><input type="radio" name="getradio2" value="5" class="radio-input"/>5</label>
            </span>
        </div>
        <div>
            <span>
                <label class="radio-label"><input type="radio" name="getradio3" value="1" class="radio-input"/>1</label>
                <label class="radio-label"><input type="radio" name="getradio3" value="2" class="radio-input"/>2</label>
                <label class="radio-label"><input type="radio" name="getradio3" value="3" class="radio-input"/>3</label>
                <label class="radio-label"><input type="radio" name="getradio3" value="4" class="radio-input"/>4</label>
                <label class="radio-label"><input type="radio" name="getradio3" value="5" class="radio-input"/>5</label>
            </span>
        </div>
        <div><label>Enter Name: <input type="text" name="fullname"/></label></div>
        <input type="hidden" name="p" value="forms/getcontroller"/>
        <input type="submit" value="Submit">
        </form>
    </div>

    <div>
        <form action="/index.php?p=forms%2Fpostcontroller" method="post">
            <div>
                <span>
                    <label class="radio-label"><input type="radio" name="getradio1" value="1" class="radio-input"/>1</label>
                    <label class="radio-label"><input type="radio" name="getradio1" value="2" class="radio-input"/>2</label>
                    <label class="radio-label"><input type="radio" name="getradio1" value="3" class="radio-input"/>3</label>
                    <label class="radio-label"><input type="radio" name="getradio1" value="4" class="radio-input"/>4</label>
                    <label class="radio-label"><input type="radio" name="getradio1" value="5" class="radio-input"/>5</label>
                </span>
            </div>
            <div>
                <span>
                    <label class="radio-label"><input type="radio" name="getradio2" value="1" class="radio-input"/>1</label>
                    <label class="radio-label"><input type="radio" name="getradio2" value="2" class="radio-input"/>2</label>
                    <label class="radio-label"><input type="radio" name="getradio2" value="3" class="radio-input"/>3</label>
                    <label class="radio-label"><input type="radio" name="getradio2" value="4" class="radio-input"/>4</label>
                    <label class="radio-label"><input type="radio" name="getradio2" value="5" class="radio-input"/>5</label>
                </span>
            </div>
            <div>
                <span>
                    <label class="radio-label"><input type="radio" name="getradio3" value="1" class="radio-input"/>1</label>
                    <label class="radio-label"><input type="radio" name="getradio3" value="2" class="radio-input"/>2</label>
                    <label class="radio-label"><input type="radio" name="getradio3" value="3" class="radio-input"/>3</label>
                    <label class="radio-label"><input type="radio" name="getradio3" value="4" class="radio-input"/>4</label>
                    <label class="radio-label"><input type="radio" name="getradio3" value="5" class="radio-input"/>5</label>
                </span>
            </div>
            <div><label>Enter Name: <input type="text"/></label></div>
            <input type="submit" value="submit"/>
        </form>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>

</html>