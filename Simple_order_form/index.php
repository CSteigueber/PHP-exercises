<?php
//---------------------------------------this line makes PHP behave in a more strict way
declare(strict_types=1);
//---------------------we are going to use session variables so we need to enable sessions
session_start();
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

$zipcodeError="";
$streetnumberError="";
$cityError="";
$streetError="";
$emailError="";

$totalValue = 0;
$error=false;
    //------------------------------------------form validation---------------------------------
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $emailError=  "<p class='alert alert-danger'>No! No! No! That's not an email adress!<p> ";
        $error=true;
    }
    if (!is_numeric($_POST["streetnumber"])){
        $streetnumberError= "<p class='alert alert-danger'>Your house number is not a house number!<p>";
        $error=true;
    }
    if (empty($_POST["street"])){
        $error=true;
        $streetError="<p class='alert alert-danger'>missing <p>";        
    }
    if (empty($_POST["city"])){
        $cityError="<p class='alert alert-danger'>missing <p>";
        $error=true;
    }
    if (!is_numeric($_POST["zipcode"])){
        $zipcodeError= "<p class='alert alert-danger'>check your zipcode! <p>";
        $error=true;
    }
    
    $_SESSION["email"]=$_POST["email"];
    $_SESSION["streetnumber"]=$_POST["streetnumber"];
    $_SESSION["street"]=$_POST["street"];
    $_SESSION["city"]=$_POST["city"];
    $_SESSION["zipcode"]=$_POST["zipcode"];
    //-------------------------------------------end form validation-----------------
    //-------------------------------------------------------your products with their price.
if ($_GET["drinks"]==0){
    $products = [
        ['name' => 'Club Ham', 'price' => 3.20],
        ['name' => 'Club Cheese', 'price' => 3],
        ['name' => 'Club Cheese & Ham', 'price' => 4],
        ['name' => 'Club Chicken', 'price' => 4],
        ['name' => 'Club Salmon', 'price' => 5],
        ['name' => 'Omlette fromage', 'price' => 6.90]
    ];
}
else {
    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];
}
//----------------------------------------------------------end of product choice---------------
//------------------------------------------------ETA-------------------------------

//-----------------------------------------------Find product choice-----------------
$choices=$_POST["products"];
$shoppingCart=[];


$choice=$_POST["products"];
for ($i=0;$i<count($products);$i++){
    if ($choice[$i]==1){
        array_push($shoppingCart,$products[$i]);
    }
}
$price=0;
for ($i=0;$i<count($shoppingCart);$i++){
   // echo ($shoppingCart[$i]["name"]."</br>");
    $price+=$shoppingCart[$i]["price"];
}

//$_SESSION=[];
require 'form-view.php';