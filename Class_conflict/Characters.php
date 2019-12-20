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
        echo "validation:</br>";
        echo $target->name. " health: ".$target->health."</br>";
        if ($target->health<=0){
            echo $target->name." died.</br>";
        }
        if ($target->health<=-100){
            echo "What an overkill!";
        }
    }

    public function __construct ($name="random humanoid",$strength=5,$speed=5,$age=0){
        $this->age=$age;
        $this->name=$name;
        $this->strength=$strength;
        $this->speed=$speed;
    }
    public function set_atr($atr,$value){
        $this ->$atr=$value;
        echo "</br>".$atr." from ".$this->name."is now ".$value."</br>";
    }
    public function increase_atr($atr,$value){
        $this->$atr+=$value;
        echo $this->name." ".$atr." increased by ".$value;
        echo "</br>".$atr." is now ".$this->$atr;
    }
    public function attack($target){
        $damage=($this->strength * rand(1,100)/100)-$target->armor;
        if ($damage<0){
            $damage=0;
        }
        $target->health-=$damage;
        echo "BAAM! ".$this->name." attacked ".$target->name."</br>";
        echo $damage." damage caused. </br>";
        $this->validate($target);
    }
}
class human extends humanoid{
    public $intellegence =50;
    public $job='random job';
    public $education='random education';
    public $speed=6;
}


?>