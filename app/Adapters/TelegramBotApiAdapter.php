<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Adapters;

use Telegram\Bot\Api;

/**
 * Description of TelegramBotApiAdapter
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class TelegramBotApiAdapter {
    
    private $api;
    public function __construct() {
        $this->api = new Api(TELEGRAM_BOT_TOKEN);
    }
    
    public function Instance(){
        return $this->api;
    }
}
