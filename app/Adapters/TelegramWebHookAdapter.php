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
    public function __construct() {
        $telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        TelegramWebHookAdapter::$webhook = 'https://'.HTTP_HOST.WEBHOOK_ROUTE;
        //$telegram->removeWebhook();
        // We are supplying a self-signed-certificate
        if(!TelegramWebHookAdapter::$webhook_is_set){
          $response = $telegram->setWebhook([
          'url' => TelegramWebHookAdapter::$webhook,
        ]);
          TelegramWebHookAdapter::$webhook_is_set= true;
        } 
       
    }
    
    public function removeWebhook(){
        $telegram->removeWebhook();
    }
}
