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
    
    public function __construct() {
        $telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        //$telegram->removeWebhook();
        // We are supplying a self-signed-certificate
        /*if(!TelegramWebHookAdapter::$webhook_is_set){
          $response = $telegram->setWebhook([
          'url' => 'https://'.HTTP_HOST.WEBHOOK_ROUTE.'/webhook',
          'certificate' => '/etc/ssl/crt/35_176_171_82.crt'
        ]);
          TelegramWebHookAdapter::$webhook_is_set= true;
        } */
        print_r('https://'.HTTP_HOST.WEBHOOK_ROUTE.'/webhook');
    }
    
    public function removeWebhook(){
        $telegram->removeWebhook();
    }
}
