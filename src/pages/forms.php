<?php

require __DIR__."/../../vendor/autoload.php";

use CrowCMS\Design;

Design::prelude();
?>

<body>
    <?php Design::header(); ?>
    <div>
        <form action="/index.php?p=forms/results" method="get">
        <div>
            <span>
                <input type="radio" name="radio1">Strongly Disagree</input>
                <input type="radio" id="radio1"></input>
                <input type="radio" id="radio1">Neutral</input>
                <input type="radio" id="radio1"></input>
                <input type="radio" id="radio1">Strongly Agree</input>
            </span>
        </div>
        <div>
            <span>
                <input type="radio" id="1">Strongly Disagree</input>
                <input type="radio" id="2"></input>
                <input type="radio" id="3">Neutral</input>
                <input type="radio" id="4"></input>
                <input type="radio" id="5">Strongly Agree</input>
            </span>
        </div>
        <div>
            <span>
                <input type="radio" id="1">Strongly Disagree</input>
                <input type="radio" id="2"></input>
                <input type="radio" id="3">Neutral</input>
                <input type="radio" id="4"></input>
                <input type="radio" id="5">Strongly Agree</input>
            </span>
        </div>
    </div>

    <div>
        <form action="/index.php?p=forms/results" method="post">
        
        </form>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>

</html>