<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions
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
//your products with their price.
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
require 'form-view.php';
$totalValue = 0;
$error=false;
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $emailError= "No! No! No! That's not an email adress! </br> ";
    $error=true;
}
else{
    $_SESSION["email"]=$_POST["email"];
}
if (is_numeric($_POST["streetnumber"])){
    $_SESSION[streetnumber]=$_POST["streetnumber"];
}
else{
    $streetnumberError= "Your house number sucks! </br>";
    $error=true;
}
if (!empty($_POST["street"])){
    $_SESSION[street]=$_POST["street"];
}
else{
    $error=true;
    $streetError="missing </br>";
}
if (!empty($_POST["city"])){
    $_SESSION[city]=$_POST["city"];
}
else{
    $cityError="missing </br>";
    $error=true;
}
if (is_numeric($_POST["zipcode"])){
    $_SESSION[zipcode]=$_POST["zipcode"];
}
else{
    $zipcodeError= "check your zipcode! </br>";
    $error=true;
}

echo "it's now ".date("H")."-".date("i").".";
echo  "Estimated time of delivery is ".(date("H")+2).":".date("i");

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
    echo ($shoppingCart[$i]["name"]."</br>");
    $price+=$shoppingCart[$i]["price"];
}
echo "</br>".$price;
var_dump($_COOKIE);
$_COOKIE["MoneySpend"]+=$price;
var_dump($_COOKIE);
/*echo $zipcodeError;
echo $streetnumberError;
echo $cityError;
echo $streetError;
echo $emailError;*/
//$_SESSION=[];