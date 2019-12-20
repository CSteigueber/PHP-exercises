<?php
class humanoid{
    public $name;
    public $health=100;
    public $speed=5;
    public $legs=2;
    public $hands=2;
    public $heads=1;
    public $intellegence;
    public $age;
    public $strength=5;
    public $armor=0;

    public function validate($target){
        $output= "validation:</br>";
        $output=$output. $target->name. " health: ".$target->health."</br>";
        if ($target->health<=0){
            $output=$output. $target->name." died.</br>";
        }
        if ($target->health<=-100){
            $output=$output. "What an overkill!";
        }
    return $output;
    }

    public function __construct ($name="random humanoid",$strength=5,$speed=5,$age=0){
        $this->age=$age;
        $this->name=$name;
        $this->strength=$strength;
        $this->speed=$speed;
    }
    public function set_atr($atr,$value){
        $this ->$atr=$value;
        $output= "</br>".$atr." from ".$this->name."is now ".$value."</br>";
        return $output;
    }
    public function increase_atr($atr,$value){
        $this->$atr+=$value;
        $output= $this->name." ".$atr." increased by ".$value;
        $output=$output. "</br>".$atr." is now ".$this->$atr;
        return $output;
    }
    public function attack($target){
        $damage=($this->strength * rand(1,100)/100)-$target->armor;
        if ($damage<0){
            $damage=0;
        }
        $target->health-=$damage;
        $output= "BAAM! ".$this->name." attacked ".$target->name."</br>";
        $output=$output. $damage." damage caused. </br>";
        $this->validate($target);
        return $output;
    }
}
class human extends humanoid{
    public $intellegence =50;
    public $job='random job';
    public $education='random education';
    public $speed=6;
}


?>