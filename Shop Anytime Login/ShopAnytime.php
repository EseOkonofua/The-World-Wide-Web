<?php
   include "ShopAnytimeMVC.php";
   session_start();
   if($_POST){    
       $user = getUser($_POST['username']);
       $_SESSION["username"] = $user->username;
       $_SESSION["address"] = $user->address;
       $_SESSION["firstname"] = $user->firstname;
       $_SESSION["lastname"] = $user->lastname;
   }
   if($_SESSION["username"] == null){
       header("Location: /eio/Assignment6/ShopAnytimeHome.php");
       exit();
   }

  

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Shop Anytime: Groceries...delivered quick...anytime...</title>
    <link rel="stylesheet" href="ShopAnytime.css" />
    <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
    <link rel="icon" href="Images/ShopAnyTime.ico" />
    
</head>
<body onload="updateItemUnit();">
    <div id="container">
        <div id="header">
            <img alt="logo" src="https://cdn0.iconfinder.com/data/icons/kameleon-free-pack-rounded/110/Online-Shopping-128.png" />
            <div id="title">
                SHOP ANYTIME!<div id="slogan">Groceries...delivered quick..anytime...</div>
            </div>
        </div>
        <div id="mainPage">
            <form onsubmit="return validatePurchase();" action="ShopAnytimeOrderComplete.php" method="post">
                <input type="hidden" name="firstname" value ="<?php print $_SESSION['firstname'] ;?>"/>
                <input type="hidden" name="lastname" value ="<?php print $_SESSION['lastname']; ?>"/>
                <div class="instructions">
                   <p>Welcome,<b> <?php print $_SESSION["firstname"]." ".$_SESSION["lastname"];?></b></p>                
                    <a  href ="Logout.php">Log out</a>
                </div>
                <div>
                      Delivery Address: 
                    <input class ="loginInput" type="text" value ="<?php print $_SESSION['address'];?>" name="address" /> 
                </div>
                
                <div id="groceryList">
                    <div class="groceryListCategory"><img alt="Meat" src="https://cdn4.iconfinder.com/data/icons/BRILLIANT/food/png/128/beef.png" /><span>Meat & Poultry</span></div>
                    <ul>
                        <li>
                            <img alt="Chicken" src="Images/Chicken.png" />
                            <div class="itemInfo">Boneless skinless Chicken Breast Fillets, <b>$4.20</b> / Pack</div>
                            Units: <input onchange="updateItemUnit();" name="chicken" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt="Bacon" src="Images/Bacon.png" />
                            <div class="itemInfo">Black Label Maple Bacon, <b>$3.99</b> / Pack </div>
                            Units: <input onchange="updateItemUnit();" name="bacon" placeholder="0" type="number" min="0" />
                        </li>

                        <li>
                            <img alt="Eggs" src="Images/Eggs.png" />
                            <div class="itemInfo">Dozen Large Grade AA Eggs, <b>$2.79</b> / Carton</div>
                            Units: <input onchange="updateItemUnit();" name="eggs" placeholder="0" type="number" min="0" />
                        </li>

                        <li>
                            <img alt="Sausage" src="Images/Sausage.png" />
                            <div class="itemInfo">Italian sausages 19.67oz, <b>$4.39</b> / Pack </div>
                            Units: <input onchange="updateItemUnit();" name="sausage" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt="Salmon" src="Images/Salmon.png" />
                            <div class="itemInfo">Skinless Salmon fillets 0.9lb, <b>$9.29</b> / Pack</div>
                            Units: <input onchange="updateItemUnit();" name="salmon" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt="Ground Beef" src="Images/Beef.png" />
                            <div class="itemInfo">Lean Ground Beef 1lb, <b>$4.50</b> / Pack</div>
                            Units: <input onchange="updateItemUnit();" name="beef" placeholder="0" type="number" min="0" />
                        </li>
                    </ul>
                    <div class="groceryListCategory"><img alt="Vegetables" src="https://cdn2.iconfinder.com/data/icons/restaurant-1/100/vegan_food_meal_dinner_lunch_restaurant_vegetables-128.png" /><span>Fruits & Vegetables</span></div>
                    <ul>
                        <li>
                            <img alt="Gala Apples" src="Images/galaApples.png" />
                            <div class="itemInfo">Gala Apples, <b>$3.46</b> / 3 pound bag </div>
                            Units: <input onchange="updateItemUnit();" name="apples" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt="Broccoli" src="Images/broccoli.png" />
                            <div class="itemInfo">Broccoli, <b>$2.49</b> / Pound </div>
                            Units: <input onchange="updateItemUnit();" name="broccoli" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt="Bananas" src="Images/banana.png" />
                            <div class="itemInfo">Premium bananas, <b>$0.59</b> / Bunch</div>
                            Units: <input onchange="updateItemUnit();" name="bananas" placeholder="0" type="number" min="0" />
                        </li>

                        <li>
                            <img alt="Potatoes" src="Images/potatos.png" />
                            <div class="itemInfo">Potatoes, <b>$3.99</b> / 10 pound bag </div>
                            Units: <input onchange="updateItemUnit();" name="potatoes" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt="Cabbage" src="Images/Cabbage.png" />
                            <div class="itemInfo">Fresh cabbage, <b>$1.24</b> / Pound </div>
                            Units: <input onchange="updateItemUnit();" name="cabbage" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt="Tomatoes" src="Images/tomatoes.png" />
                            <div class="itemInfo">Cherry tomatoes, <b>$2.50</b> / Pound </div>
                            Units: <input onchange="updateItemUnit();" name="tomatoes" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt="Onions" src="Images/Onions.png" />
                            <div class="itemInfo">Onions, <b>$2.40</b> / Pound </div>
                            Units: <input onchange="updateItemUnit();" name="onions" placeholder="0" type="number" min="0" />
                        </li>
                    </ul>
                    <div class="groceryListCategory"><img alt="Toast" src="https://cdn3.iconfinder.com/data/icons/breakfast/toast.png"  /><span>Dairy, Pastries & Other</span></div>
                    <ul>
                        <li>
                            <img alt ="Buns"src="Images/Buns.png" />
                            <div class="itemInfo">Hamburger buns 8 Pack, <b>$1.99</b> / Bag of 8  </div>
                            Units: <input onchange="updateItemUnit();" name="buns" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt ="bread"src="Images/bread.png" />
                            <div class="itemInfo">Sliced bread, <b>$2.59</b> / Package</div>
                            Units: <input onchange="updateItemUnit();" name ="bread" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt ="Milk" style ="width:150px"src="Images/Milk.png" />
                            <div class="itemInfo">1% Milk 2L, <b>$3.19</b> / Carton </div>
                            Units: <input onchange="updateItemUnit();" name="milk" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img style="width:170px" alt="Yogurt" src="Images/Yogurt.png" />
                            <div class="itemInfo">All Natural Plain Yogurt, <b>$2.99</b> / 6oz Container </div>
                            Units: <input onchange="updateItemUnit();" name="yogurt" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img style ="width:160px"alt ="Cereal"src="Images/Cereal.png" />
                            <div class="itemInfo">Cereal, <b>$3.49</b> / Box </div>
                            Units: <input onchange="updateItemUnit();" name = "cereal" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img style="width:170px" alt="Oil" src="Images/Oil.png" />
                            <div class="itemInfo">Cooking Oil 2L, <b>$3.99</b> / Bottle </div>
                            Units: <input onchange="updateItemUnit();" name = "oil" placeholder="0" type="number" min="0" />
                        </li>
                        <li>
                            <img alt ="Coffee" src="Images/Coffee.png" />
                            <div class="itemInfo">Premium Coffee beans, <b>$30.99</b> / 1Kg bag  </div>
                            Units: <input onchange="updateItemUnit();" name="coffee" placeholder="0" type="number" min="0" />
                        </li>

                    </ul>
                          
                    <div class="footer">Ese Okonofua @ Queenu's University</div>
                </div>
                <div class="fixedBox">
                    <div class="priceView">
                        <div class="priceViewImportant">
                            <div class="numberView" id="itemNumber"></div> <p><span id ="noItemsError" class ="error"></span>items in Checkout</p>
                            <p>Total Price:</p>
                            
                            <div class="numberView" id="totalPrice"></div>
                            <input id="orderBtn" class="button " value="Order" type="submit" />
                            <a onclick ="expandPriceView(this.innerHTML)"href ="#" id="togglePriceView">Expand Details</a> <img onclick="togglePriceViewColor(this.alt)" title="Paint!" alt="standard" id ="paintImage" src="Images/paintbrush.png"/>
                        
                        </div>
                        <div class="priceViewNotImportant">
                            <div >
                                <p>Delivery Charge: </p>
                                <div id ="delivery" class="numberView"></div>
                                  <p>Tax: </p>
                                <div id="tax" class="numberView"></div>
                            </div>
                            <div>
                                <p>Non-Taxable Items: </p>
                                <div id="nontaxable" class="numberView"></div>
                                <p>Taxable Items:</p>
                                <div id="taxable" class="numberView"></div>
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
<script src="ShopAnytimeScript.js"></script>