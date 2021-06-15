<?php

namespace App\Helpers;

class Order
{ 
    /**
     * The price of the order from orderbook.
     *
     * @var Float
     */
    public $price;

    /**
     * The quantity of the order from orderbook
     *
     * @var Float
     */
    public $quantity;
    
    public function __construct(float $price, float $quantity)
    {
        $this->price = $price;
        $this->quantity = $quantity;
    }

}