<?php
namespace App;

Class Brie extends Item
{

public function Improve(){

$this->quality += 1;

$this->sell_in -= 1;

if($this->sell_in <= 0){
    $this->quality += 1;
}

if($this->quality >= 50){
    $this->quality = 50;
}
}
}