
function showPopup() {
    document.getElementsByClassName("popup")[0].className = "show popup";
}

function hidePopup() {
    document.getElementsByClassName("popup")[0].className = "popup";
}


function validateRegister() {
    var xmlhttp;
    var response;
    var password = document.getElementsByName("passwordRegister")[0].value;
    var passwordConfirm = document.getElementsByName("confirmpasswordRegister")[0].value;
    var loginId = document.getElementsByName("usernameRegister")[0].value;
    if (password.length < 6) {
        document.getElementById("passwordRegisterError").innerHTML = "Password is not long enough!";
        return false;
    }
    else if (password != passwordConfirm) {
        document.getElementById("passwordRegisterError").innerHTML = "Passwords do not match!";
        return false;
    }
    else if (loginId.length < 6) {
        document.getElementById("usernameRegisterError").innerHTML = "Username not long enough!";
        return false;
    }
    else {

        if (document.getElementById("userCheck").value == "invalid") {
            document.getElementById("usernameRegisterError").innerHTML = "Username already in use!";
            return false;
        }
        return true;

    }
}


function checkUserValid(user) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            response = xmlhttp.responseText;
            response = response.trim();
            document.getElementById("userCheck").value = response;
        }
    }
    xmlhttp.open("GET", "ShopRegister.php?username=" + user, true);
    xmlhttp.send();
}

function checkLogin(user, password) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            response = xmlhttp.responseText;
            response = response.trim();
            document.getElementById("loginCheck").value = response;
        }
    }
    xmlhttp.open("GET", "CheckUser.php?username=" + user + "&password=" + password, true);
    xmlhttp.send();
}


function updateUsernameError() {
    document.getElementById('usernameRegisterError').innerHTML = '';
}

function updatePasswordError() {
    document.getElementById("passwordRegisterError").innerHTML = '';
}

function validateLogin(username, password) {
    var error = document.getElementById("loginError");
    var combinationCheck = document.getElementById("loginCheck");
    if (username.length < 6) {
        error.innerHTML = "Username too short!";
        return false;
    }
    else if (password.length < 6) {
        error.innerHTML = "Password too short!";
        return false;
    }
    if (combinationCheck.value == "invalid") {
        error.innerHTML = "Invalid username/password combination!";
        return false;
    }
    return true;
}

//Grocery calculations
var DELIVERY = 5.00;
var TAX = 0.13;

//Meat
var CHICKEN = 4.20; var BACON = 3.99; var EGGS = 2.79; var SAUSAGE = 4.39; var SALMON = 9.29; var BEEF = 4.50;
//Veges
var APPLES = 3.46; var BROCCOLI = 2.49; var BANANAS = 0.59; var POTATOES = 3.99; var CABBAGE = 1.24; var TOMATOES = 2.50; var ONIONS = 2.40;
//Other
var BUNS = 1.99; var BREAD = 2.59; var MILK = 3.19; var YOGURT = 2.99; var CEREAL = 3.49; var OIL = 3.99; var COFFEE = 30.99;

//unit items
var chicken = document.getElementsByName('chicken'); var bacon = document.getElementsByName('bacon');
var eggs = document.getElementsByName('eggs'); var sausage = document.getElementsByName('sausage');
var salmon = document.getElementsByName('salmon'); var beef = document.getElementsByName('beef');

var apples = document.getElementsByName('apples'); var broccoli = document.getElementsByName('broccoli');
var bananas = document.getElementsByName('bananas'); var potatoes = document.getElementsByName('potatoes');
var cabbage = document.getElementsByName('cabbage'); var tomatoes = document.getElementsByName('tomatoes');
var onions = document.getElementsByName('onions');

var buns = document.getElementsByName('buns'); var bread = document.getElementsByName('bread');
var milk = document.getElementsByName('milk'); var yogurt = document.getElementsByName('yogurt');
var cereal = document.getElementsByName('cereal'); var oil = document.getElementsByName('oil');
var coffee = document.getElementsByName('coffee');

//functions
function updateItemUnit() {

    var number = Number(chicken[0].value) + Number(bacon[0].value) +Number(eggs[0].value) + Number(sausage[0].value) + Number(salmon[0].value) + Number(beef[0].value) + Number(apples[0].value) + Number(broccoli[0].value) + Number(bananas[0].value) +
   Number(potatoes[0].value) + Number(cabbage[0].value) + Number(tomatoes[0].value) + Number(onions[0].value) + Number(buns[0].value) + Number(bread[0].value) + Number(milk[0].value) +Number(yogurt[0].value) + Number(cereal[0].value) + Number(oil[0].value) + Number(coffee[0].value);

    document.getElementById("itemNumber").innerHTML = number;
    updatePrices();
    document.getElementById("noItemsError").innerHTML = "";
}

function expandPriceView(value){
    var priceView = document.getElementsByClassName("priceView");
    if (value == "Expand Details"){
        priceView[0].className = priceView[0].className + " expand";
        document.getElementById("togglePriceView").innerHTML = "Minimize Details";
        document.getElementById("groceryList").className = "expand";
    }
    else{
        priceView[0].className = "priceView";
        document.getElementById("togglePriceView").innerHTML = "Expand Details";
        document.getElementById("groceryList").className = "";
    }
}
function updatePrices(){
    var delivery = document.getElementById("delivery");
    var tax = document.getElementById("tax");
    var nontaxable = document.getElementById("nontaxable");
    var taxable = document.getElementById("taxable");
    var totalprice = document.getElementById("totalPrice")

    var nontaxableprice = Number(apples[0].value)*APPLES + Number(broccoli[0].value)*BROCCOLI + Number(bananas[0].value*BANANAS) + Number(potatoes[0].value)*POTATOES + Number(cabbage[0].value)*CABBAGE + Number(tomatoes[0].value)*TOMATOES + Number(onions[0].value)*ONIONS;

    var taxableprice =  Number(chicken[0].value)*CHICKEN + Number(bacon[0].value)*BACON +Number(eggs[0].value)*EGGS + Number(sausage[0].value)*SAUSAGE + Number(salmon[0].value)*SALMON + Number(beef[0].value)*BEEF+ Number(buns[0].value)*BUNS + Number(bread[0].value)*BREAD + Number(milk[0].value)*MILK +Number(yogurt[0].value)*YOGURT + Number(cereal[0].value)*CEREAL + Number(oil[0].value)*OIL + Number(coffee[0].value)*COFFEE;
    
    var taxprice = Number(chicken[0].value)*CHICKEN*TAX + Number(bacon[0].value)*BACON*TAX +Number(eggs[0].value)*EGGS*TAX + Number(sausage[0].value)*SAUSAGE*TAX + Number(salmon[0].value)*SALMON*TAX + Number(beef[0].value)*BEEF*TAX+ Number(buns[0].value)*BUNS*TAX + Number(bread[0].value)*BREAD*TAX + Number(milk[0].value)*MILK*TAX +Number(yogurt[0].value)*YOGURT*TAX + Number(cereal[0].value)*CEREAL*TAX + Number(oil[0].value)*OIL*TAX + Number(coffee[0].value)*COFFEE*TAX;
    var number = Number(chicken[0].value) + Number(bacon[0].value) +Number(eggs[0].value) + Number(sausage[0].value) + Number(salmon[0].value) + Number(beef[0].value) + Number(apples[0].value) + Number(broccoli[0].value) + Number(bananas[0].value) +
   Number(potatoes[0].value) + Number(cabbage[0].value) + Number(tomatoes[0].value) + Number(onions[0].value) + Number(buns[0].value) + Number(bread[0].value) + Number(milk[0].value) +Number(yogurt[0].value) + Number(cereal[0].value) + Number(oil[0].value) + Number(coffee[0].value);
    if(number == 0){
        delivery.innerHTML = 0;
        tax.innerHTML = 0;
        nontaxable.innerHTML = 0;
        taxable.innerHTML = 0;
        totalprice.innerHTML = 0;
    }
    else{
        delivery.innerHTML = "$"+DELIVERY;
        nontaxable.innerHTML = "$"+parseFloat(nontaxableprice).toFixed(2);
        taxable.innerHTML = "$"+parseFloat(taxableprice).toFixed(2);
        tax.innerHTML = "$"+parseFloat(taxprice).toFixed(2);
        totalprice.innerHTML = "$"+parseFloat(DELIVERY + nontaxableprice + taxableprice + taxprice).toFixed(2);
        
    }
}

function validatePurchase(){
        var number = Number(chicken[0].value) + Number(bacon[0].value) +Number(eggs[0].value) + Number(sausage[0].value) + Number(salmon[0].value) + Number(beef[0].value) + Number(apples[0].value) + Number(broccoli[0].value) + Number(bananas[0].value) +
   Number(potatoes[0].value) + Number(cabbage[0].value) + Number(tomatoes[0].value) + Number(onions[0].value) + Number(buns[0].value) + Number(bread[0].value) + Number(milk[0].value) +Number(yogurt[0].value) + Number(cereal[0].value) + Number(oil[0].value) + Number(coffee[0].value);
   if(number <= 0){
       document.getElementById("noItemsError").innerHTML = "Empty Checkout!";
       return false;
   }
   return true;
}

function togglePriceViewColor(mode){
   var target =  document.getElementsByClassName('fixedBox');
   var classname = target[0].className;
   if(mode == "standard"){
       target[0].className = target[0].className + " alternateColor";
       document.getElementById("paintImage").alt = "alternate";
   }
   else{
       target[0].className = "fixedBox";
       document.getElementById("paintImage").alt = "standard";
   }
}