<?php

namespace App;

class Item {

    // public $name;
    public $sell_in;
    public $quality;

    function __construct($sell_in, $quality) {
        // $this->name    = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }
    public function Improve(){}

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}

