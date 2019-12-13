<?php

namespace App;

class GildedRoseTest extends \PHPUnit\Framework\TestCase {
    public function testFoo() {
        // 'updates normal items before sell date'
        $items      = [new Item("regular", 5, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 9 );
        $this->assertEquals($items[0]->sell_in, 4 );
    
        // updates normal items on the sell date
        $items      = [new Item("regular", 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 8 );
        $this->assertEquals($items[0]->sell_in, -1 ); 

        // updates normal items after the sell date
        $items      = [new Item("regular", -5, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 8 );
        $this->assertEquals($items[0]->sell_in, -6 ); 

        // updates normal items with quality - 0 
        $items      = [new Item("regular", 5, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 0 );
        $this->assertEquals($items[0]->sell_in, 4 ); 

        // updates Brie items before the sell date
        $items      = [new Item("Aged Brie", 5, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 11 );
        $this->assertEquals($items[0]->sell_in, 4 ); 

        // updates Brie items before the sell date with maximum quality
        $items      = [new Item("Aged Brie", 5, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 50 );
        $this->assertEquals($items[0]->sell_in, 4 ); 

        // updates Brie items on the sell date
        $items      = [new Item("Aged Brie", 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 12 );
        $this->assertEquals($items[0]->sell_in, -1 ); 

        // updates Brie items on the sell date, near maximum quality
        $items      = [new Item("Aged Brie", 0, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 50 );
        $this->assertEquals($items[0]->sell_in, -1 ); 

        // updates Brie items on the sell date, with maximum quality
        $items      = [new Item("Aged Brie", 0, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 50 );
        $this->assertEquals($items[0]->sell_in, -1 ); 

        // updates Brie items after the sell date
        $items      = [new Item("Aged Brie", -10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 12 );
        $this->assertEquals($items[0]->sell_in, -11 ); 

        // updates Briem items after the sell date with maximum quality
        $items      = [new Item("Aged Brie", -9, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 50 );
        $this->assertEquals($items[0]->sell_in, -10 ); 

        // updates Sulfuras items before the sell date
        $items      = [new Item("Sulfuras, Hand of Ragnaros", 5, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 80 );
        $this->assertEquals($items[0]->sell_in, 5 ); 

         // updates Sulfuras items on the sell date
         $items      = [new Item("Sulfuras, Hand of Ragnaros", 0, 10)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 80 );
         $this->assertEquals($items[0]->sell_in, 0 ); 

         // updates Sulfuras items after the sell date
         $items      = [new Item("Sulfuras, Hand of Ragnaros", -1, 10)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 80 );
         $this->assertEquals($items[0]->sell_in, -1 ); 

         // updates Backstage pass items long before the sell date
         $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 11, 10)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 11 );
         $this->assertEquals($items[0]->sell_in, 10 ); 

         // updates Backstage pass items close to the sell date
         $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 10)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 12 );
         $this->assertEquals($items[0]->sell_in, 9 ); 

         // updates Backstage pass items close to the sell data, at max quality
         $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 10, 50)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 50 );
         $this->assertEquals($items[0]->sell_in, 9 ); 

         // updates Backstage pass items very close to the sell data
         $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 10)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 13 );
         $this->assertEquals($items[0]->sell_in, 4 ); 

         // updates Backstage pass items very close to the sell data, at max quality
         $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 5, 50)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 50 );
         $this->assertEquals($items[0]->sell_in, 4 ); 

         // updates Backstage pass items with one day left to sell
         $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 1, 10)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 13 );
         $this->assertEquals($items[0]->sell_in, 0 ); 

         // updates Backstage pass items with one day left to sell, at max quality
         $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 1, 50)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 50 );
         $this->assertEquals($items[0]->sell_in, 0 ); 

        // updates Backstage pass items on sell date
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 0);
        $this->assertEquals($items[0]->sell_in, -1 ); 

        // updates Backstage pass items after sell date
        $items      = [new Item("Backstage passes to a TAFKAL80ETC concert", -1, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 0);
        $this->assertEquals($items[0]->sell_in, -2 ); 

         // updates Conjured items before the sell date
         $items      = [new Item("Conjured Mana Cake", 10, 10)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 8);
         $this->assertEquals($items[0]->sell_in, 9);
         
         // updates Conjured items at zero quality
         $items      = [new Item("Conjured Mana Cake", 10, 0)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 0);
         $this->assertEquals($items[0]->sell_in, 9);

         // updates Conjured items on the sell date
         $items      = [new Item("Conjured Mana Cake", 0, 10)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 6);
         $this->assertEquals($items[0]->sell_in, -1);

         // updates Conjured items on the sell date at 0 quality
         $items      = [new Item("Conjured Mana Cake", 0, 0)];
         $gildedRose = new GildedRose($items);
         $gildedRose->updateQuality();
         $this->assertEquals($items[0]->quality, 0);
         $this->assertEquals($items[0]->sell_in, -1);

        // updates Conjured items after the sell date 
        $items      = [new Item("Conjured Mana Cake", -10, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 6);
        $this->assertEquals($items[0]->sell_in, -11);

        // updates Conjured items after the sell date at zero quality 
        $items      = [new Item("Conjured Mana Cake", -10, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals($items[0]->quality, 0);
        $this->assertEquals($items[0]->sell_in, -11);
       
       } 
}
