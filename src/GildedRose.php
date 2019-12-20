<?php
namespace App;
class GildedRose
{
    protected static $lookup = [
        'regular' => Regular::class,
        'Aged Brie' => Brie::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePass::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Conjured Mana Cake' => Conjured::class
    ];
    public static function takeone($name, $quality, $sellIn) {
        $class = isset(static::$lookup[$name])
            ? static::$lookup[$name]
            : Item::class;
        return new $class($quality, $sellIn);
    }
}
