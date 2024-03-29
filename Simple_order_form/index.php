<?php
//---------------------------------------this line makes PHP behave in a more strict way
declare(strict_types=1);
//---------------------we are going to use session variables so we need to enable sessions
session_start();
define ("ownerEmail", "stijn.peeters.it@gmail.com");
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

function updateSession(){
    if (!empty($_POST["email"])){
        $_SESSION["email"]=$_POST["email"];
    }
    if (!empty($_POST["streetnumber"])){
        $_SESSION["streetnumber"]=$_POST["streetnumber"];
    }
    if (!empty($_POST["street"])){
        $_SESSION["street"]=$_POST["street"];
    }
    if (!empty($_POST["city"])){
        $_SESSION["city"]=$_POST["city"];
    }
    if (!empty($_POST["zipcode"])){
        $_SESSION["zipcode"]=$_POST["zipcode"];
    }
}
function validate(){
    global $error;global $emailError;global $streetError;global $streetnumberError;global $zipcodeError;global $cityError;
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
}

function sendemail($email, $orders,$price,$eta){
    $order="";
    for ($i=0; $i<count($orders);$i++){
        $order=$order.$orders[$i]['name'].", ";
    }
    $msg="Dear Customer, \nYou ordered ".$order;
    $msg=$msg."Your billing is just ".number_format($price,2)." EUR";
    $msg=$msg."\n".$eta;
    $subject="Your order at BeCode";
    mail($email,$subject,$msg);
    mail (ownerEmail,$subject,$msg);
}
$zipcodeError="";
$streetnumberError="";
$cityError="";
$streetError="";
$emailError="";

$totalValue = 0;
$error=false;

    //-------------------------------------------------------your products with their price.
if ($_GET["drinks"]==0){
    $products = [
        ['name' => 'Club Ham', 'price' => 3.20],
        ['name' => 'Club Cheese', 'price' => 3],
        ['name' => 'Club Cheese & Ham', 'price' => 4],
        ['name' => 'Club Chicken', 'price' => 4],
        ['name' => 'Club Salmon', 'price' => 5],
        ['name' => 'Omlette fromage', 'price' => 6.90],
        ['name' => 'express delivery', 'price'=> 2.00]
    ];
}
else {
    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
        ['name' => 'express delivery', 'price'=> 2.00]
    ];
}
//----------------------------------------------------------end of product choice---------------

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
    $price+=$shoppingCart[$i]["price"];
}

updateSession();
if (!empty($_POST)){
    validate();
}
require 'form-view.php';
validate();
updateSession();
if (!$error){
    $h=date("H");
    $min=date("i");
    $arr=[12,3,14];
    $i=count($shoppingCart)-1;
    if ($shoppingCart[$i]['name']=="express delivery"){
        echo "express delivery</br>";
        $min+=45;
        if ($min>=60){
            $min%=60;
            $h+=1;
            if ($h>=24){
                $h%=24;
            }
        }
    } 
    else{
        $h+=2;
        if ($h>=24){
            $h%=24;
        }
    }
    $eta="Estimates time of delivery is ".$h.":".sprintf("%02d",$min).".";
   sendemail($_POST["email"],$shoppingCart,$price,$eta);
   echo "It's done!";
}
//$_SESSION=[];