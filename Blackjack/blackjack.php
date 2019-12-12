<?php
class Blackjack{
    public $name;
    public $score=0;
    public $lost=false;
    public $turn=true;
    public function __construct($str){
        $this->name=$str;
    }
    public function hit(){
        $card=rand(1,11);
        $this->score+=$card;
        $output= "The card is ".$rand."</br>".$this->name."'s score is ".$this->score."</br>";
        if ($this->score>21){
            $this->lost=true;
            $output=$output.$this->name." lost!";
        }
        return $output;
    }
    public function stand(){
        $this->turn=false;
    }
    public function surrender(){
        $this->lost=true;
        return "You surrendered</br>Pussy!</br>";
    }
}