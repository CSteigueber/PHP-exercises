<?php
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
session_start();
require 'home.php';
if ($_GET["action"]=="New game"){
    $_SESSION["game"]=true;
    require 'blackjack.php';
    $_SESSION["player"]=new Blackjack("player");
    $_SESSION["dealer"]=new Blackjack("dealer");
    ob_clean();
    require 'home.php';
}
if ($_SESSION["player"]->turn==true){
    echo "check";
}
var_dump($_SESSION["player"]);
//whatIsHappening();
if ($_SESSION["game"]==true && $_SESSION["player"]->turn==true){
    if ($_GET["action"]=="Hit"){
        $_SESSION["player"]->hit();
    }
    if ($_GET["action"]=="Stand"){
        $_SESSION["player"]->stand();

    }    
    if ($_GET["action"]=="Surrender"){

        $_SESSION["player"]->surrender();
    }

}
//$_SESSION["game"]=false;