<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Adapters\CoinDeskAdapter', function($app)
        {
            $api_url = config('services.coindesk.api_url');
            $default_currency = config('services.coindesk.default_currency');
            return new \App\Adapters\CoinDeskAdapter($api_url,$default_currency);
        });
    }
}
