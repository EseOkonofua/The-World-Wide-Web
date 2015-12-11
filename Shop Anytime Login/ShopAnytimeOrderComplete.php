<?php
    session_start();
    
    if($_POST){
        if($_SESSION["username"] == NULL){
            header("Location: /eio/Assignment6/ShopAnytimeHome.php");
             exit();
        }
    }
    else{
         header("Location: /eio/Assignment6/ShopAnytimeHome.php");
         exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <style>a:hover{ color: white} </style>
        <meta charset="utf-8" />
        <title>Shop Anytime: Checkout</title>
        <link rel="stylesheet" href="ShopAnytime.css" />
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet" type="text/css">
        <link rel="icon" href="Images/ShopAnyTime.ico" />
    </head>
    <body>
        <div id="receiptHeader">
            <img alt="Logo" src="https://cdn0.iconfinder.com/data/icons/kameleon-free-pack-rounded/110/Online-Shopping-128.png" />
            <div id="title">
                            SHOP ANYTIME!
            </div>
        </div>
        <div id="receipt">
            <div id="receiptBody">

                <div class="instructions">
                            Order placed! Delivery arriving shortly 
                </div>
                <div id="receiptUserInfo">
                    <?php print $_SESSION["firstname"]." ".$_SESSION["lastname"] ;?>
                    <span>
                        <?php print date("Y/m/d");?>
                    </span>
                                </br>
                    <?php print $_POST["address"];?>
                    
                </div>
                <center> 
                    <p>Thanks for shopping with us! </p>
                    <a href="ShopAnytimeReturn.php"><h3>Return to store!</h3></a>
                </center>
            </div>
        </div>
    </body>
</html>
