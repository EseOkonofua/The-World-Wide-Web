<?php
    include "ShopAnytimeMVC.php";
    if($_GET){
        $user = checkLogin($_GET['username'],$_GET['password']);
        if (count($user) <1){
            print "invalid";
        }
        else 
            print "valid";
    }

?>

