<?php

namespace App\Providers;

use App\Api\Cryptowatch;
use Illuminate\Support\ServiceProvider;

class OrderBookServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('App\Contracts\OrderBookServiceInterface', function ($app) {
            return new Cryptowatch();
          });
    }
}
