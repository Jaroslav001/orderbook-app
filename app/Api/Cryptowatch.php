<?php
namespace App\Api;

use App\Contracts\OrderBookServiceInterface;
use App\Helpers\OrderBook;
use Illuminate\Support\Facades\Http;


class Cryptowatch implements OrderBookServiceInterface
{
	public function getOrderBook() : OrderBook
	{
		$data = $this->endpointRequest('https://api.cryptowat.ch/markets/kraken/btcusd/orderbook');
		$orderBook = new OrderBook($data);

		return $orderBook;
    }
   
	public function endpointRequest($url)
	{
        $response = Http::get($url);      
        return $this->responseHandler($response);
	}

	public function responseHandler($response)
	{
		if ($response) {

            return $response->json();
		}
	
		return [];
	}

}