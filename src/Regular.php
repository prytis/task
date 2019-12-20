<?php
namespace App;

Class Regular extends Item{

public function Improve(){
    
    $this->sell_in -= 1;
    $this->quality -= 1;

    if($this->sell_in <= 0){
        $this->quality -= 1;
    }

    
    if($this->quality < 0){
        $this->quality = 0;
    }

    

    

    }
}