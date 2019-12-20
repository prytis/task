<?php
namespace App;

Class Conjured extends Item{

public function Improve(){

        
    $this->sell_in -= 1; 

    if($this->quality == 0){
        return ;
    }

    $this->quality -= 2;
    
    if($this->sell_in <= 0){
        $this->quality -= 2;
    }
}
}