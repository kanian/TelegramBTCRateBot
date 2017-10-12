<?php

namespace App\Adapters;

use Telegram\Bot\Api;

/**
 * Description of TelegramWebHookAdapter
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class TelegramWebHookAdapter {
    
    public static $webhook_is_set = false;
    public static $webhook;
    private static $telegram;
    
    public function __construct() {
        TelegramWebHookAdapter::$telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        TelegramWebHookAdapter::$webhook = 'https://'.HTTP_HOST.WEBHOOK_ROUTE;  
    }
    
    public function removeWebhook(){
        TelegramWebHookAdapter::$telegram->removeWebhook();
    }
    
    public function setWebhook(){
        if(!TelegramWebHookAdapter::$webhook_is_set){
          $response = TelegramWebHookAdapter::$telegram->setWebhook([
          'url' => TelegramWebHookAdapter::$webhook,
        ]);
          TelegramWebHookAdapter::$webhook_is_set= true;
        }
    }
}
