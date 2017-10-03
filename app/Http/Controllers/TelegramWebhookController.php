<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of TelegramWebhookController
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class TelegramWebhookController extends Controller {
    
    public function __construct(){
        //$this->middleware('auth');
    }
    
    /**
     * Process incoming Telegram Bot Webhook
     * 
     * @return \Illuminate\Http\Response 
     */
    public function process($token){
        if($token !== TELEGRAM_BOT_TOKEN)
            return 'false';
        $telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        //$update = $telegram->getWebhookUpdates();
        $update = $telegram->commandsHandler(true);
        print_r(count($update));
            // Commands handler method returns an Update object.
            // So you can further process $update object 
            // to however you want.
	
        return 'ok';

    }
}
