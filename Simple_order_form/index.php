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
//your products with their price.
$list=$_GET["food"];
if ($list==1){
    $products = [
        ['name' => 'Club Ham', 'price' => 3.20],
        ['name' => 'Club Cheese', 'price' => 3],
        ['name' => 'Club Cheese & Ham', 'price' => 4],
        ['name' => 'Club Chicken', 'price' => 4],
        ['name' => 'Club Salmon', 'price' => 5]
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
$totalValue = 0;
$error=false;
require 'form-view.php';
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $emailError= "No! No! No! That's not an email adress! ";
    $error=true;
}
else{
    $_SESSION["email"]=$_POST["email"];
}
if (is_numeric($_POST["streetnumber"])){
    $_SESSION[streetnumber]=$_POST["streetnumber"];
}
else{
    $streetnumberError= "Your house number sucks!";
    $error=true;
}
if (!empty($_POST["street"])){
    $_SESSION[street]=$_POST["street"];
}
else{
    $error=true;
    $streetError="missing";
}
if (!empty($_POST["city"])){
    $_SESSION[city]=$_POST["city"];
}
else{
    $cityError="missing";
    $error=true;
}
if (is_numeric($_POST["zipcode"])){
    $_SESSION[zipcode]=$_POST["zipcode"];
}
else{
    $zipcodeError= "check your zipcode!";
    $error=true;
} 
//whatIsHappening();
//$_SESSION=[];