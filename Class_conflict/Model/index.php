<?php
function battle ($player1,$player2){
    $totalSpeed=$player1->speed+$player2->speed;
    
    do {
        $dice=rand(1,$totalSpeed);
        if (($player1->speed>=$dice)&& ($player1->health>0)){ 
            $player1->attack($player2);
        }
        else{
            if ($player2->health>0){
                $player2->attack($player1);
            }
        }
        echo "</br></br>";
    }
    while ($player1->health>0 && $player2->health>0);
    if ($player1->health>0){
        $winner=$player1->name;
    }
    else{
        $winner=$player2->name;
    }
    $output= "</br></br>Victory for ".$winner."!!!</br></br>";
}
require 'Characters.php';   
session_start();
require ('../View/home.php');
require ('../Controller/controller.php');
/*echo "Game on!</br>";
$player= new human("Claas",10,9);
$enemy01=new human("dude",6);
$player->set_atr("strength",10);
battle($player,$enemy01);
echo "</br></br>";
if ($player->health>0){
    $enemy02=new human("Stijn",10,4);
    $player->increase_atr("armor",2);
    battle($player,$enemy02);
    echo "</br></br>";
    echo "</br></br>Claas is taking a rest to recover. ";
    if ($player->health>0){
        $player->increase_atr("health",50);
        $enemy03= new human ("Jasper",8,7);
        battle($enemy03,$player);
        echo "</br></br>";
    }

}



echo "</br>Game over!";*/