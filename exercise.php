<?php

namespace App;


class GildedRose {

    private $items;


    function __construct($items) {
        $this->items = $items;
    }

    function updateQuality() {

        foreach ($this->items as $item) {

            switch ($item->name){
                case 'regular':
                    return $this->regularImprove($item);
                case 'Aged Brie':
                    return $this->brieImprove($item);  
                case 'Sulfuras, Hand of Ragnaros':
                    return $this->sulfurasImprove($item);
                case 'Backstage passes to a TAFKAL80ETC concert':
                    return $this->backStageImprove($item);
                case 'Conjured Mana Cake':
                    return $this->ConjuredImprove($item);
            }

           
        }
        
    }  
    protected function regularImprove($item){
    
    $item->sell_in -= 1;

    
    if($item->quality == 0){
        return;
    }

    $item->quality -= 1;

    if($item->sell_in <= 0){
        $item->quality -= 1;
    }

    }

    protected function brieImprove($item){

        $item->quality += 1;

        $item->sell_in -= 1;

        if($item->sell_in <= 0){
            $item->quality += 1;
        }

        if($item->quality >= 50){
            $item->quality = 50;
        }
    }
    protected function sulfurasImprove($item){

        if($item->quality != 80){
            $item->quality = 80;
        }

    }
    protected function backStageImprove($item){

        $item->sell_in -= 1; 

        if($item->quality >= 50){
            return;
        } 

        if($item->sell_in < 0){
            return $item->quality = 0;
        }
        $item->quality += 1; 
        
        if($item->sell_in < 10){
            $item->quality += 1;
        }
        if($item->sell_in < 5){
            $item->quality += 1;
        }
        
    }
    protected function ConjuredImprove($item){

        
        $item->sell_in -= 1; 

        if($item->quality == 0){
            return ;
        }

        $item->quality -= 2;
        
        if($item->sell_in <= 0){
            $item->quality -= 2;
        }
    }
}

