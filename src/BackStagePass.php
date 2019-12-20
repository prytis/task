<?php
namespace App;

Class BackStagePass extends Item{

public function Improve(){

    $this->sell_in -= 1; 

    if($this->quality >= 50){
        return;
    } 

    if($this->sell_in < 0){
        return $this->quality = 0;
    }
    $this->quality += 1; 
    
    if($this->sell_in < 10){
        $this->quality += 1;
    }
    if($this->sell_in < 5){
        $this->quality += 1;
    }
    
}

}