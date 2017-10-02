<?php

namespace App\Adapters;

use Telegram\Bot\Api;

/**
 * Description of TelegramWebHookAdapter
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class TelegramWebHookAdapter {
    
    public function __construct() {
        $telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        //$telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        // We are supplying a self-signed-certificate
        $response = $telegram->setWebhook([
          'url' => 'https://'.HTTP_HOST.WEBHOOK_ROUTE.'/webhook',
          'certificate' => 'btcratebot.crt'
        ]);
    }
}
