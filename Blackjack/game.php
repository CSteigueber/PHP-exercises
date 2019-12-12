<?php
session_start();
$_SESSION["game"]=false;
require 'home.php';
if ($_GET["action"]=="New game"){
    $_SESSION["game"]=true;
    ob_clean();
    require 'home.php';
}
require 'blackjack.php';
$player=new Blackjack("player");
$dealer=new Blackjack("dealer");