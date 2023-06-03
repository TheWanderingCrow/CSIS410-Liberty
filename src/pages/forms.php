<?php

require __DIR__."/../../vendor/autoload.php";

use CrowCMS\Design;

Design::prelude();
?>

<body>
    <?php Design::header(); ?>
    <div>
        <p> Please rate the products shown below on a scale of 1-5. 1 being the lowest, and 5 being the greatest. </p>
    </div>
    <div style="margin-left:20px;">
        <form action="index.php" method="get">
        <div>
            <div><label>TP-Link Archer AX55</label></div>
            <div><img src="https://i5.walmartimages.com/asr/5d4f4019-5e3c-439d-be57-0384ba6b4943.55f370f33dd4913b4e7043db7a1173e3.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" class="prod-image"></div>
            <span>
                <label class="radio-label"><input type="radio" name="getradio1" value="1" class="radio-input" required/>1</label>
                <label class="radio-label"><input type="radio" name="getradio1" value="2" class="radio-input" required/>2</label>
                <label class="radio-label"><input type="radio" name="getradio1" value="3" class="radio-input" required/>3</label>
                <label class="radio-label"><input type="radio" name="getradio1" value="4" class="radio-input" required/>4</label>
                <label class="radio-label"><input type="radio" name="getradio1" value="5" class="radio-input" required/>5</label>
            </span>
        </div>
        <br>
        <div>
            <div><label>ASUS AX6000</label></div>
            <div><img src="https://m.media-amazon.com/images/I/71tsvrnPVyL._AC_SL1500_.jpg" class="prod-image"></div>
            <span>
                <label class="radio-label"><input type="radio" name="getradio2" value="1" class="radio-input" required/>1</label>
                <label class="radio-label"><input type="radio" name="getradio2" value="2" class="radio-input" required/>2</label>
                <label class="radio-label"><input type="radio" name="getradio2" value="3" class="radio-input" required/>3</label>
                <label class="radio-label"><input type="radio" name="getradio2" value="4" class="radio-input" required/>4</label>
                <label class="radio-label"><input type="radio" name="getradio2" value="5" class="radio-input" required/>5</label>
            </span>
        </div>
        <br>
        <div>
            <div><label>TP-Link AC1900</label></div>
            <div><img src="https://m.media-amazon.com/images/I/61NSuBZzm7L._AC_SL1500_.jpg" class="prod-image"></div>
            <span>
                <label class="radio-label"><input type="radio" name="getradio3" value="1" class="radio-input" required/>1</label>
                <label class="radio-label"><input type="radio" name="getradio3" value="2" class="radio-input" required/>2</label>
                <label class="radio-label"><input type="radio" name="getradio3" value="3" class="radio-input" required/>3</label>
                <label class="radio-label"><input type="radio" name="getradio3" value="4" class="radio-input" required/>4</label>
                <label class="radio-label"><input type="radio" name="getradio3" value="5" class="radio-input" required/>5</label>
            </span>
        </div>
        <div><label>Enter Name: <input type="text" name="fullname" required/></label></div>
        <input type="hidden" name="p" value="forms/getcontroller"/>
        <input type="submit" value="Submit: GET">
        </form>
    </div>
    <br><br>
    <div style="margin-left:20px;">
        <form action="/index.php?p=forms%2Fpostcontroller" method="post">
            <div>
                <div><label>TP-Link Archer AX55</label></div>
                <div><img src="https://i5.walmartimages.com/asr/5d4f4019-5e3c-439d-be57-0384ba6b4943.55f370f33dd4913b4e7043db7a1173e3.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" class="prod-image"></div>
                <span>
                    <label class="radio-label"><input type="radio" name="postradio1" value="1" class="radio-input" required/>1</label>
                    <label class="radio-label"><input type="radio" name="postradio1" value="2" class="radio-input" required/>2</label>
                    <label class="radio-label"><input type="radio" name="postradio1" value="3" class="radio-input" required/>3</label>
                    <label class="radio-label"><input type="radio" name="postradio1" value="4" class="radio-input" required/>4</label>
                    <label class="radio-label"><input type="radio" name="postradio1" value="5" class="radio-input" required/>5</label>
                </span>
            </div>
            <br>
            <div>
                <div><label>ASUS AX6000</label></div>
                <div><img src="https://m.media-amazon.com/images/I/71tsvrnPVyL._AC_SL1500_.jpg" class="prod-image"></div>
                <span>
                    <label class="radio-label"><input type="radio" name="postradio2" value="1" class="radio-input" required/>1</label>
                    <label class="radio-label"><input type="radio" name="postradio2" value="2" class="radio-input" required/>2</label>
                    <label class="radio-label"><input type="radio" name="postradio2" value="3" class="radio-input" required/>3</label>
                    <label class="radio-label"><input type="radio" name="postradio2" value="4" class="radio-input" required/>4</label>
                    <label class="radio-label"><input type="radio" name="postradio2" value="5" class="radio-input" required/>5</label>
                </span>
            </div>
            <br>
            <div>
                <div><label>TP-Link AC1900</label></div>
                <div><img src="https://m.media-amazon.com/images/I/61NSuBZzm7L._AC_SL1500_.jpg" class="prod-image"></div>
                <span>
                    <label class="radio-label"><input type="radio" name="postradio3" value="1" class="radio-input" required/>1</label>
                    <label class="radio-label"><input type="radio" name="postradio3" value="2" class="radio-input" required/>2</label>
                    <label class="radio-label"><input type="radio" name="postradio3" value="3" class="radio-input" required/>3</label>
                    <label class="radio-label"><input type="radio" name="postradio3" value="4" class="radio-input" required/>4</label>
                    <label class="radio-label"><input type="radio" name="postradio3" value="5" class="radio-input" required/>5</label>
                </span>
            </div>
            <div><label>Enter Name: <input type="text" name="fullname" required/></label></div>
            <input type="submit" value="Submit: POST"/>
        </form>
    </div>
    <?php Design::footer(__FILE__); ?>
</body>

</html>