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
    switch (true){
        case ($_SESSION[$name1]->lost==true): 
            echo $_SESSION[$name1]->name." lost"; 
        break; 
        case ($_SESSION[$name1]->lost==false && $_SESSION[$name2->lost==true]): 
            echo $_SESSION[$name2]->name." lost";
        break; 
        case ($_SESSION[$name1]->lost==false && $_SESSION[$name2]->lost==false && $dScore>0):
            $_SESSION[$name2]->lost=true;
            echo $_SESSION[$name1]->name." won!";
        break;
        case ($_SESSION[$name1]->lost==false && $_SESSION[$name2]->lost==false && $dScore<=0):
            $_SESSION[$name1]->lost=true;
            echo $_SESSION[$name2]->name." won!";
        break;
    }
}
require 'blackjack.php';
session_start();
require 'home.php';
if ($_GET["action"]=="New game"){
    $_SESSION["game"]=true;
    $_SESSION["player"]=new Blackjack("player");
    $_SESSION["dealer"]=new Blackjack("dealer");
    ob_clean();
    require 'home.php';

}
if ( $_SESSION["player"]->turn==true){
    switch ($_GET["action"]){
        case "Hit":         $_SESSION["player"]->hit();         break;
        case "Stand":       $_SESSION["player"]->stand();       break;
        case "Surrender":   $_SESSION["player"]->surrender();   break;
    }
}
if ($_SESSION["player"]->turn==false){
    while (($_SESSION["dealer"]->turn==true)&& $_SESSION["dealer"]->score<=15){
        $_SESSION["dealer"]->hit();
    }
    if ($_SESSION["dealer"]->lost==false){
        $_SESSION["dealer"]->stand();
    }
}
if (($_SESSION["player"]->turn==false)&&$_SESSION["dealer"]->turn==false){
    $_SESSION["game"]=false;
    validate("player","dealer");
}