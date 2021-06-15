<?php

use App\Api\Cryptowat;
use App\Helpers\OrderBook;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Cryptowat $cryptowat) {

    //return view('orderbook',['data' => Http::get('https://api.cryptowat.ch/markets/kraken/btcusd/orderbook') ]);
    $data = $cryptowat->getOrderBook();

    $orderBook = new OrderBook($data);

    
    dd($orderBook->getBestAskForAmount(1));
    return $orderBook;
});
