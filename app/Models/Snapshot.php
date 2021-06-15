<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snapshot extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'best_bid' => 'array',
        'best_ask' => 'array',
    ];

    public function getTextInfoAttribute() : String
    {
        return  'Base Currency = '. $this->base_currency . "\n" .
                'Quote Currency = '. $this->quote_currency . "\n" .
                'Min. Quantity = '. $this->min_quantity . "\n" .
                'Best Bid = [' . $this->best_bid['price'] . ', ' . $this->best_bid['quantity'] . "]\n" .
                'Best Ask = [' . $this->best_ask['price'] . ', ' . $this->best_ask['quantity'] . "]\n" .
                'Sale = ' . $this->sale;       
    }
}
