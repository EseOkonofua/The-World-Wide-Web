<?php
//GROCERY ITEM PRICES
    //Delivery
    define("DELIVERY",3.00);
    //Tax
    define("TAX",0.13);
    //Meat Prices
    define("CHICKEN",4.20);define("BACON", 3.99);define("EGGS",2.79);define("SAUSAGE",4.39);
    define("SALMON",9.29);define("BEEF", 4.50);
    //Vegetable Prices
    define("APPLES", 3.46);define("BROCCOLI", 2.49);define("BANANAS", 0.59);define("POTATOES", 3.99);
    define("CABBAGE", 1.24); define("TOMATOES", 2.50); define("ONIONS", 2.40);
    //Other Prices
    define("BUNS",1.99);define("BREAD", 2.59);define("MILK", 3.19);define("YOGURT", 2.99);
    define("CEREAL",3.49);define("OIL", 3.99);define("COFFEE", 30.99);

//USER INFO
    $name = $_POST["name"]; $address = $_POST["address"];

//GET ORDERED ITEMS
    //Meats
    $chicken= intval($_POST["chicken"]); $bacon = intval($_POST["bacon"]); $eggs = intval($_POST["eggs"]); $sausage = intval($_POST["sausage"]); 
    $salmon = intval($_POST["salmon"]); $beef = intval($_POST["beef"]);
    //Veges
    $apples= intval($_POST["apples"]);$broccoli= intval($_POST["broccoli"]);$bananas= intval($_POST["bananas"]);$potatoes= intval($_POST["potatoes"]);
    $cabbage= intval($_POST["cabbage"]);$tomatoes= intval($_POST["tomatoes"]);$onions= intval($_POST["onions"]);
    //other
    $buns= intval($_POST["buns"]);$bread= intval($_POST["bread"]);$milk= intval($_POST["milk"]);$yogurt= intval($_POST["yogurt"]);
    $cereal= intval($_POST["cereal"]);$oil= intval($_POST["oil"]);$coffee= intval($_POST["coffee"]);

//CALCULATIONS
    //Checking for for empty checkout
    $itemAmount = $chicken+$bacon+$eggs+$sausage+$salmon+$beef+$apples+$broccoli+$bananas+$potatoes+$cabbage+$tomatoes+$onions+$buns+$bread+
    $milk+$yogurt+$cereal+$oil+$coffee;
    //Subtotal
    $subtotal = $chicken*CHICKEN + $bacon*BACON + $eggs*EGGS + $sausage*SAUSAGE + $salmon*SALMON + $beef*BEEF + $apples*APPLES + $broccoli*BROCCOLI+
    $bananas*BANANAS + $potatoes*POTATOES + $cabbage*CABBAGE + $tomatoes*TOMATOES + $onions*ONIONS + $buns*BUNS + $bread*BREAD + $milk*MILK + $yogurt*YOGURT+
    $cereal*CEREAL + $oil*OIL + $coffee*COFFEE;
    //Tax
    $hst=$chicken*CHICKEN*TAX + $bacon*BACON*TAX + $eggs*EGGS*TAX + $sausage*SAUSAGE*TAX + $salmon*SALMON*TAX + $beef*BEEF*TAX+ $buns*BUNS*TAX + $bread*BREAD*TAX + $milk*MILK*TAX + $yogurt*YOGURT*TAX+
    $cereal*CEREAL*TAX + $oil*OIL*TAX + $coffee*COFFEE*TAX;
    //Total
    $total=$subtotal+$hst+DELIVERY;


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Shop AnyTime: Checkout</title>
		<link rel="stylesheet" href="ShopAnytime.css" />
		<link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
		<link rel="icon" href="Images/ShopAnyTime.ico" />
    </head>
    <body>
        <div style ="min-width: 1000px"id="container">
            <?php 
                 if($itemAmount == 0){
                    print "<div id = 'receiptHeader'>";
                        print "<img alt = 'EmptyCheckout' src = 'https://cdn0.iconfinder.com/data/icons/Hand_Drawn_Web_Icon_Set/128/basket_error.png'/>";
                        print "<div id = 'title'>";
                            print "EMPTY CHECKOUT!";
                        print "</div>";

                    print "</div>";
                }
                else{
                    print "<div id = 'receiptHeader'>";
                        print "<img alt = 'Logo' src = 'https://cdn0.iconfinder.com/data/icons/kameleon-free-pack-rounded/110/Online-Shopping-128.png'/>";
                        print "<div id = 'title'>";
                            print "SHOP ANYTIME!";
                        print "</div>";
                    print "</div>";
                }
            ?>    
             <div id="receipt">
                 <div id="receiptBody">
                     <?php 
                        if($itemAmount == 0){
                            print "<div class = 'instructions'>";
                                print "Empty check out...No items selected.";   
                            print "</div>";         
                            print "<center>";   
                                print "<input onclick='history.go(-1)' value = '<< Back' id = 'backBtn' class = 'button' type = 'button'/>";
                            print "</center>";
                        }
                        else{
                           print "<div class = 'instructions'>";
                                print "Checkout receipt";   
                           print "</div>"; 
                           print "<div id = 'receiptUserInfo'>";
                                print $name;
                                print "<span>";
                                    print date("Y/m/d");
                                print "</span>";
                                print "</br>";
                                print $address;
                           print "</div>";                          
                           print "<div class = 'receiptListHeader'>";
                                print"<div class ='quantity'>";
                                print "QTY";
                                print "</div>";
                                print"<div class ='description'>";
                                print "DESCRIPTION";
                                print "</div>";
                                print"<div class ='price'>";
                                print "PRICE";
                                print "</div>";
                           print "</div>";
                           print "<hr />";
                           if($chicken != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class ='quantity'>";
                                print $chicken;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Boneless skinless chicken breast fillets";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(CHICKEN*$chicken,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($bacon != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class ='quantity'>";
                                print $bacon;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Black label maple bacon";
                                print "</div>";
                                print"<div class ='price'>";                     
                                print number_format(BACON*$bacon,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($eggs != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class ='quantity'>";
                                print $eggs;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Dozen large grade AA eggs";
                                print "</div>";
                                print"<div class ='price'>";                    
                                print number_format(EGGS*$eggs,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                            if($sausage != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class ='quantity'>";
                                print $sausage;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Italian sausages 19.67oz";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(SAUSAGE*$sausage,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                            if($salmon != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class ='quantity'>";
                                print $salmon;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Skinless salmon fillets 0.9lb";
                                print "</div>";
                                print"<div class ='price'>";                       
                                print number_format(SALMON*$salmon,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                            if($beef != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $beef;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Lean ground beef 1lb";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(BEEF*$beef,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                            if($apples != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $apples;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Gala Apples 3lb Bag";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(APPLES*$apples,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                            if($broccoli != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $broccoli;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Broccoli";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(BROCCOLI*$broccoli,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($bananas != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $bananas;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Premium bananas";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(BANANAS*$bananas,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($potatoes != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $potatoes;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Potatoes 10lb bag";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(POTATOES*$potatoes,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($cabbage != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $cabbage;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Fresh cabbage";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(CABBAGE*$cabbage,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($tomatoes != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $tomatoes;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Cherry tomatoes";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(TOMATOES*$broccoli,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($onions != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $onions;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Onions";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(ONIONS*$onions,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                          if($buns != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $buns;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Hamburger buns 8 pack";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(BUNS*$buns,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($bread != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $bread;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Sliced bread";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(BREAD*$bread,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($milk != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $milk;
                                print "</div>";
                                print"<div class ='description'>";
                                print "1% Milk 2L";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(MILK*$milk,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($yogurt != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $yogurt;
                                print "</div>";
                                print"<div class ='description'>";
                                print "All natural plain Yogurt";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(YOGURT*$yogurt,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($cereal != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $cereal;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Cereal";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(CEREAL*$cereal,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($oil != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $oil;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Cooking oil 2L";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(OIL*$oil,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                           if($coffee != 0){
                                print "<div class = 'receiptListHeader'>";
                                print"<div class='quantity'>";
                                print $coffee;
                                print "</div>";
                                print"<div class ='description'>";
                                print "Premium coffee beans 1kg bag";
                                print "</div>";
                                print"<div class ='price'>";
                                print number_format(COFFEE*$coffee,2,'.','');
                                print "</div>";
                           print "</div>";
                           }
                         print "<div class = 'receiptTotals' >";
                            print "Subtotal:<span>".number_format($subtotal,2,'.','')."</span><br/>";
                            print "H.S.T:<span>".number_format($hst,2,'.','')."</span><br/>";
                            print "Delivery charge:<span>".number_format(DELIVERY,2,'.','')."</span><br/>";
                            print "Total:<span>".number_format($total,2,'.','')."</span>";
                         print "</div>";
                         print "<div class = 'greeting'>";
                         print "Thank you for shopping with ANYTIME SHOPPING your order has been processed.";
                         print "</div>";
                        }
                    ?>  
                  
                 </div>
           
            </div>
        </div>     
    </body>
</html>
