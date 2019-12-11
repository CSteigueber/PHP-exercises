<?php
function battle ($player1,$player2){
    do {
    if ($player1->health>0){
        $player1->attack($player2);
    }
    if ($player2->health>0){
        $player2->attack($player1);
    }
    echo "</br></br>";
}
while ($player1->health>0 && $player2->health>0);
}

echo "Game on!</br>";
require 'Characters.php';   
$claas= new human("Claas");
$enemy01=new human("dude",6);
$claas->set_atr("strength",10);
battle($claas,$enemy01);
echo "</br></br>";
$enemy02=new human("Stijn");
battle($claas,$enemy02);
echo "</br></br>";
echo "</br></br>Claas is taking a rest to recover. ";
$claas->increase_atr("health",50);
$enemy03= new human ("Jasper");
$enemy03->set_atr("strength", 8);
battle($enemy03,$claas);
echo "</br></br>";



echo "</br>Game over!";