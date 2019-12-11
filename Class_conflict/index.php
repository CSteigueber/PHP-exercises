<?php
require 'Characters.php';   
$claas= new homo_sapiens("Claas", 34);
$claas->set_strength(66);
$claas->set_atr("health",200);
echo "Game on!";
var_dump($claas);