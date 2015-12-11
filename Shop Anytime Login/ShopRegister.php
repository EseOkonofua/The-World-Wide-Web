<?php
    include "ShopAnytimeMVC.php";
    if(isset($_GET['username'])){
        $user = checkUsername($_GET['username']);
        if (count($user) < 1){
            print "valid";
        }
        else {
            print "invalid";
        }
    }
    if($_POST){
        $fname = $_POST['firstnameRegister'];
        $lname = $_POST['lastnameRegister'];
        $add = $_POST['addressRegister'];
        $uname = $_POST['usernameRegister'];
        $pwd = $_POST['passwordRegister'];

        createAccount($fname,$lname,$add,$uname,$pwd);

        header("Location: /eio/Assignment6/ShopAnytimeHome.php?Register='success'");
        
        exit();
    }
?>

