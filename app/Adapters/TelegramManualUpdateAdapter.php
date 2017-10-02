<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Adapters;

/**
 * Description of TelegramCronAdapter
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class TelegramManualUpdateAdapter {
    
    private  $_telegram = NULL;
    public function __construct(\App\Adapters\TelegramBotApiAdapter $telegram) {
        $this->_telegram = $telegram;
    }
    
    public function getUpdates(){
        $updates = $this->_telegram->getUpdates();
    }
}
