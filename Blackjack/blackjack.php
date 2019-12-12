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
        $output= "The card is ".$card."</br>".$this->name."'s score is ".$this->score."</br>";
        if ($this->score>21){
            $this->lost=true;
            $this->turn=false;
            $output=$output.$this->name." lost!";

        }
        echo $output;
    }
    public function stand(){
        $this->turn=false;
        echo $this->name." chooses to stand.</br>";
    }
    public function surrender(){
        $this->lost=true;
        $this->turn=false;
        echo "You surrendered</br>Pussy!</br>";
    }
}