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
        
        // We don't want the webhook to be registered to Telegram everytime we get
        // an instance of this service
        
        $this->app->singleton('App\Adapters\TelegramWebHookAdapter', function($app)
        {
            return new \App\Adapters\TelegramWebHookAdapter();
        });
        
        $this->app->singleton('App\Adapters\TelegramManualUpdateAdapter', function($app)
        {
            return new \App\Adapters\TelegramManualUpdateAdapter();
        });
        
        // Let's not recreate the telegram api object everytime we need it
        $this->app->singleton('App\Adapters\TelegramBotApiAdapter', function($app)
        {
            return new \App\Adapters\TelegramBotApiAdapter();
        });
        $this->app->singleton('App\Adapters\CommandBusAdapter', function($app)
        {
            return new \App\Adapters\CommandBusAdapter();
        });
        
        $this->app->singleton('App\Commands\StartCommand', function($app)
        {
            return new \App\Commands\StartCommand();
        });
        $this->app->singleton('App\Commands\GetUserIDCommand', function($app)
        {
            return new \App\Commands\GetUserIDCommand();
        });
        $this->app->singleton('App\Commands\CommandParsers\CommandParser', function($app)
        {
            return new \App\Commands\CommandParser\CommandParser();
        });
    }
}
