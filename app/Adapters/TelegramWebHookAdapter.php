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
          //'certificate' => '/opt/lampstack-7.0.12-0/apache2/conf/patrickassoaadou_site.crt'
          'certificate' => '../patrickassoaadou_site.crt'
        ]);
          TelegramWebHookAdapter::$webhook_is_set= true;
        } 
       
    }
    
    public function removeWebhook(){
        $telegram->removeWebhook();
    }
}
