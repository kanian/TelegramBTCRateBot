<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Commands;

use App\Commands\Command;
/**
 * Description of TelegramBotCommand
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class TelegramBotCommand extends Command {
    
    private $_telegram = NULL;
    
    public function __construct(){
        $this->_telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        parent::__construct(API_URL);
    }
    
    public function getTelegram(){
        return $_telegam;
    }
    public function replyWithMessage($params){
        return $this->jsonPostRequest("sendMessage", $params);
    }
    
    public function replyWithChatAction($params){
        return $this->postRequest('sendChatAction', $params);
    }

    public function make($telegram, $arguments, $update)
    {
        $this->telegram = $telegram;
        $this->arguments = $arguments;
        $this->update = $update;

        return $this->handle($arguments);
    }
    
    // Trigger another command dynamically from within this command
        // When you want to chain multiple commands within one or process the request further.
        // The method supports second parameter arguments which you can optionally pass, By default
        // it'll pass the same arguments that are received for this command originally.
        //$this->triggerCommand('subscribe');
}
