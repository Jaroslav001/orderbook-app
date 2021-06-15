<?php namespace App\Contracts;

interface OrderBookServiceInterface {

    /**
     * Get orderbook from market API.
     *
     * @return OrderBook
     */
    public function getOrderBook();

}