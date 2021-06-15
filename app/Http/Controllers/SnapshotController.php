<?php

namespace App\Http\Controllers;


use App\Models\Snapshot;
use App\Contracts\OrderBookServiceInterface;


class SnapshotController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $orderBookServiceInstance;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(OrderBookServiceInterface $orderBookServiceInstance)
    {
        $this->orderBookServiceInstance = $orderBookServiceInstance;
    }
    
    /**
    * Store a new snapshot of best bids and asks from orderbook with minimum amount.
    *
    * @return Snapshot
    */
    public function store() : Snapshot
    {        
        $orderBook = $this->orderBookServiceInstance->getOrderBook();     
        $snapshot = Snapshot::create([
            'base_currency' => 'BTC',
            'quote_currency' => 'USD',
            'min_quantity' => 1,
            'best_bid' => $orderBook->getBestBidForAmount(1),
            'best_ask' => $orderBook->getBestAskForAmount(1),
            'sale' => true,
        ]);
        $snapshot->save();

        return $snapshot;
    }

}
