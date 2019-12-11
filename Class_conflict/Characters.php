<?php
class humanoid{
    public $name;
    public $health=100;
    public $speed;
    public $legs=2;
    public $hands=2;
    public $heads=1;
    public $intellegence;
    public $age;
    public $strength;

    public function __construct ($name="random humanoid",$age){
        $this->age=$age;
        $this->name=$name;
    }
    public function set_strength($strength){
        $this->strength=$strength;
    }
    public function set_atr($atr,$value){
        $this ::$$atr=$value;
    }

}
class homo_sapiens extends humanoid{
    public $intellegence =50;
    public $job='random job';
    public $education='random education';
    public $speed=6;
}


?>