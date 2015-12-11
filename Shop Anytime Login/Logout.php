<?php
    session_start();
 function logOut(){
       session_unset();
       session_destroy();
       header("Location: /eio/Assignment6/ShopAnytimeHome.php");
       exit();
   }
   logOut();
?>
