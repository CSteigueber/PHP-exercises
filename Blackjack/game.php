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
function validate($name1,$name2){
    $dScore=$_SESSION[$name1]->score - $_SESSION[$name2]->score;
    echo "Validation:</br>";
    switch (true){
        case ($_SESSION[$name1]->lost==true): 
            echo $_SESSION[$name1]->name." lost";
            $_SESSION["money"]-=5; 
        break; 
        case (/*$_SESSION[$name1]->lost==false &&*/ $_SESSION[$name2]->lost==true): 
            echo $_SESSION[$name1]->name." won";
            $_SESSION["money"]+=5;
        break; 
        case ($_SESSION[$name1]->lost==false && $_SESSION[$name2]->lost==false && $dScore>0):
            $_SESSION[$name2]->lost=true;
            echo $_SESSION[$name1]->name." won!";
            $_SESSION["money"]+=3;
        break;
        case ($_SESSION[$name1]->lost==false && $_SESSION[$name2]->lost==false && $dScore<=0):
            $_SESSION[$name1]->lost=true;
            echo $_SESSION[$name1]->name." lost!";
            $_SESSION["money"]-=3;
        break;
    }
}
require 'blackjack.php';
session_start();
//$_SESSION["money"]=1000;
if (!isset($_SESSION["money"])){
    $_SESSION["money"]=30;
}
require 'home.php';
if ($_GET["action"]=="New game"){
    if ($_SESSION["money"]>0){
        $_SESSION["game"]=true;
        $_SESSION["player"]=new Blackjack("player");
        $_SESSION["dealer"]=new Blackjack("dealer");
        ob_clean();
        require 'home.php';
    }
    else{
        echo "You have no credit here. Leave!";
        $_SESSION["game"]=false;
    }

}
if ( $_SESSION["player"]->turn==true){
    switch ($_GET["action"]){
        case "Hit":         $_SESSION["player"]->hit();         break;
        case "Stand":       $_SESSION["player"]->stand();       break;
        case "Surrender":   $_SESSION["player"]->surrender();   break;
    }
}
if ($_SESSION["player"]->turn==false && $_SESSION["game"]==true){
    while (($_SESSION["dealer"]->turn==true)&& $_SESSION["dealer"]->score<=15){
        $_SESSION["dealer"]->hit();
    }
    if ($_SESSION["dealer"]->lost==false){
        $_SESSION["dealer"]->stand();
    }
}
if (($_SESSION["player"]->turn==false)&&$_SESSION["dealer"]->turn==false && $_SESSION["game"]==true){
    $_SESSION["game"]=false;

    validate("player","dealer");
}