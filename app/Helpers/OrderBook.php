<?php

namespace App\Helpers;

use App\Helpers\Order;

class OrderBook
{ 
    /**
     * The bids from orderbook.
     *
     * @var array<Order>
     */
    public $bids  = [];

    /**
     * The asks from orderbook.
     *
     * @var array<Order>
     */
    public $asks  = [];

    public function __construct($data)
    {
        foreach($data['result']['bids'] as $bid)
        {
            $this->bids[] = new Order($bid[0], $bid[1]);
        }

        foreach($data['result']['asks'] as $ask)
        {
            $this->asks[] = new Order($ask[0], $ask[1]);
        }
    }

    public function getBestBidForAmount($minAmount)
    {
        foreach( $this->bids as $bid)
        {
            if($bid->quantity >= $minAmount)
            {
                return $bid;
            }
        }

        return null;
    }

    public function getBestAskForAmount($minAmount)
    {                      
        foreach( $this->asks as $ask)
        {
            if($ask->quantity >= $minAmount)
            {
                return $ask;
            }
        }

        return null;
    }


}
