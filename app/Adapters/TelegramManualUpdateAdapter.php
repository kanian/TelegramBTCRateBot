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
    public function __construct() {
        $this->_telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
    }
    
    public function getUpdates(){
        $updates = $this->_telegram->getUpdates();
        return $updates;
        //$startCmd = app('App\Commands\StartCommand');
        //$startCmd->handle("");
    }
}
