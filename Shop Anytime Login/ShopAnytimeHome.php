<?php 
session_start();
if($_SESSION["username"] != NULL){
    header('Location: /eio/Assignment6/ShopAnytime.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Shop Anytime: Login</title>
        <link rel="stylesheet" href="ShopAnytime.css" />
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet" type="text/css">
        <link rel="icon" href="Images/ShopAnyTime.ico" />
        <script src="ShopAnytimeScript.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <img alt="logo" src="https://cdn0.iconfinder.com/data/icons/kameleon-free-pack-rounded/110/Online-Shopping-128.png" />
                <div id="title">
                    SHOP ANYTIME!<div id="slogan">Groceries...delivered quick..anytime...</div>
                </div>
            </div>

            <div id="loginBox">
                <h2>Log In <small id="loginError" class="error"></small></h2>
                <?php if(isset($_GET['Register']) ){ print "<span class ='success' /> Account created </span>";} ?>
                <hr />
                <form onsubmit="return validateLogin(document.getElementsByName('username')[0].value ,document.getElementsByName('password')[0].value );" action="ShopAnytime.php" method="post">
                    <input type ="hidden" id ="loginCheck" value ="invalid"/>
                    <input onkeyup ="checkLogin(document.getElementsByName('username')[0].value ,document.getElementsByName('password')[0].value)"  name="username" required placeholder="Username" class="loginInput" type="text" />
                    <input onkeyup ="checkLogin(document.getElementsByName('username')[0].value ,document.getElementsByName('password')[0].value)" name="password" required placeholder="Password" class="loginInput" type="password" />
                    <button  class="loginButton" type="submit">Log In</button>
                </form>
                <div id="loginFooter">
 New here?
                    <a onclick="showPopup();" href="#">Create a new account </a>
                </div>

            </div>
            <div class="popup">
                <div id="registerBox">
                    <h2><img height="20" alt="user" src="Images/user.png" />Create account <span onclick="hidePopup();" id="closeRegisterWindow">X</span></h2>
                    <hr />
                    <center><small style="text-align: center;width: 100%;">Password & Login ID must be at least a length of 6. You will be redirected to the Log in page on successful register!</small>       </center>
                    <form onsubmit="return validateRegister();" method="POST" action="ShopRegister.php">
                        <input id="userCheck" type="hidden" value="valid">
                        <input autocomplete="off" name="firstnameRegister" class="loginInput" placeholder="First name" type="text" required /><br><br>
                        <input autocomplete="off" name="lastnameRegister" class="loginInput" placeholder="Last name" type="text" required /><br><br>
                        <input autocomplete="off" name="addressRegister" class="loginInput" type="text" placeholder="Home address" required /><br><br>
                        <input autocomplete="off" onkeydown="updateUsernameError();" onkeyup="checkUserValid(this.value);" name="usernameRegister" type="text" class="loginInput" placeholder="Username" /><span class="error" id="usernameRegisterError"></span><br><br>
                        <input autocomplete="off" onkeydown="updatePasswordError();" required min="6" name="passwordRegister" type="password" placeholder="Password" class="loginInput" /> <span class="error" id="passwordRegisterError"></span><br><br>
                        <input autocomplete="off" onkeydown="updatePasswordError();" required min="6" name="confirmpasswordRegister" type="password" placeholder="Confirm Password" class="loginInput" />
                        <br>
                        <button class="loginButton" type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
