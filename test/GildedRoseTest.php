<?php

namespace App;
class GildedRoseTest extends \PHPUnit\Framework\TestCase{

function testRegularProduct(){
    
        // 'updates regular items before sell date'
        $items = GildedRose::takeone("regular", 10, 5);
        $items->Improve();
        $this->assertEquals($items->quality, 4);
        $this->assertEquals($items->sell_in, 9);

        // updates regular items on the sell date
        $items = GildedRose::takeone("regular", 0, 10);
        $items->Improve();
        $this->assertEquals($items->quality, 8);
        $this->assertEquals($items->sell_in, -1);

        // updates regular items after the sell date
        $items = GildedRose::takeone("regular", -5, 10);
        $items->Improve();
        $this->assertEquals($items->quality, 8);
        $this->assertEquals($items->sell_in, -6);

        // updates regular items with quality - 0 
        $items      = GildedRose::takeone("regular", 5, 0);
        $items->Improve();
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, 4);
    }
    function testAgedBrieProduct()
    {
        // updates Brie items before the sell date
        $items = GildedRose::takeone("Aged Brie", 5, 10);
        $items->Improve();
        $this->assertEquals($items->quality, 11);
        $this->assertEquals($items->sell_in, 4);

        // updates Brie items before the sell date with maximum quality
        $items = GildedRose::takeone("Aged Brie", 5, 50);
        $items->Improve();
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, 4);

        // updates Brie items on the sell date
        $items = GildedRose::takeone("Aged Brie", 0, 10);
        $items->Improve();
        $this->assertEquals($items->quality, 12);
        $this->assertEquals($items->sell_in, -1);

        // updates Brie items on the sell date, near maximum quality
        $items = GildedRose::takeone("Aged Brie", 0, 49);
        $items->Improve();
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, -1);

        // updates Brie items on the sell date, with maximum quality
        $items = GildedRose::takeone("Aged Brie", 0, 50);
        $items->Improve();
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, -1);

        // updates Brie items after the sell date
        $items = GildedRose::takeone("Aged Brie", -10, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 12);
        $this->assertEquals($items->sell_in, -11);

        // updates Briem items after the sell date with maximum quality
        $items = GildedRose::takeone("Aged Brie", -9, 50);
        $items->Improve();;
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, -10);
    }
    function testSulfurasProduct()
    {
        // updates Sulfuras items before the sell date
        $items = GildedRose::takeone("Sulfuras, Hand of Ragnaros", 5, 0);
        $items->Improve();;
        $this->assertEquals($items->quality, 80);
        $this->assertEquals($items->sell_in, 5);

        // updates Sulfuras items on the sell date
        $items = GildedRose::takeone("Sulfuras, Hand of Ragnaros", 0, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 80);
        $this->assertEquals($items->sell_in, 0);

        // updates Sulfuras items after the sell date
        $items = GildedRose::takeone("Sulfuras, Hand of Ragnaros", -1, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 80);
        $this->assertEquals($items->sell_in, -1);
    }
    function testBackstagePassProduct()
    {
        // updates Backstage pass items long before the sell date
        $items = GildedRose::takeone("Backstage passes to a TAFKAL80ETC concert", 11, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 11);
        $this->assertEquals($items->sell_in, 10);

        // updates Backstage pass items close to the sell date
        $items = GildedRose::takeone("Backstage passes to a TAFKAL80ETC concert", 10, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 12);
        $this->assertEquals($items->sell_in, 9);

        // updates Backstage pass items close to the sell data, at max quality
        $items = GildedRose::takeone("Backstage passes to a TAFKAL80ETC concert", 10, 50);
        $items->Improve();;
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, 9);

        // updates Backstage pass items very close to the sell data
        $items = GildedRose::takeone("Backstage passes to a TAFKAL80ETC concert", 5, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 13);
        $this->assertEquals($items->sell_in, 4);

        // updates Backstage pass items very close to the sell data, at max quality
        $items = GildedRose::takeone("Backstage passes to a TAFKAL80ETC concert", 5, 50);
        $items->Improve();;
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, 4);

        // updates Backstage pass items with one day left to sell
        $items = GildedRose::takeone("Backstage passes to a TAFKAL80ETC concert", 1, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 13);
        $this->assertEquals($items->sell_in, 0);

        // updates Backstage pass items with one day left to sell, at max quality
        $items = GildedRose::takeone("Backstage passes to a TAFKAL80ETC concert", 1, 50);
        $items->Improve();;
        $this->assertEquals($items->quality, 50);
        $this->assertEquals($items->sell_in, 0);

        // updates Backstage pass items on sell date
        $items = GildedRose::takeone("Backstage passes to a TAFKAL80ETC concert", 0, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, -1);

        // updates Backstage pass items after sell date
        $items = GildedRose::takeone("Backstage passes to a TAFKAL80ETC concert", -1, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, -2);
    }
    function testConjuredProduct()
    {
        // updates Conjured items before the sell date
        $items = GildedRose::takeone("Conjured Mana Cake", 10, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 8);
        $this->assertEquals($items->sell_in, 9);

        // updates Conjured items at zero quality
        $items = GildedRose::takeone("Conjured Mana Cake", 10, 0);
        $items->Improve();;
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, 9);

        // updates Conjured items on the sell date
        $items = GildedRose::takeone("Conjured Mana Cake", 0, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 6);
        $this->assertEquals($items->sell_in, -1);

        // updates Conjured items on the sell date at 0 quality
        $items = GildedRose::takeone("Conjured Mana Cake", 0, 0);
        $items->Improve();;
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, -1);

        // updates Conjured items after the sell date 
        $items = GildedRose::takeone("Conjured Mana Cake", -10, 10);
        $items->Improve();;
        $this->assertEquals($items->quality, 6);
        $this->assertEquals($items->sell_in, -11);

        // updates Conjured items after the sell date at zero quality 
        $items = GildedRose::takeone("Conjured Mana Cake", -10, 0);
        $items->Improve();;
        $this->assertEquals($items->quality, 0);
        $this->assertEquals($items->sell_in, -11);
    }
}
