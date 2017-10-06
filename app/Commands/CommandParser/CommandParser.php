<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Commands\CommandParser;

/**
 * Description of CommandParser
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class CommandParser {
    
    public function __construct( ){
        
       
    }
    
    /**
     * Some pre-processing
     * 
     */
    public function processUpdates($webhook = false){
        
        // Get a telegram api instance
        $telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();

        if ($webhook) {
            $update = $telegram->getWebhookUpdates();
            $this->processCommand($update);

            return $update;
        }
        
        $updates = $telegram->getUpdates();
                
        // Let any listener know that we received updates
        event(new \App\Events\UpdatesWereReceived(collect($updates)->map(function ($item, $key) { 
                        return $item->getMessage()->getFrom();
                    })));

        // Pass the updates to the command processor
        $highestId = -1;

        foreach ($updates as $update) {
            $highestId = $update->getUpdateId();
            if($update->has('message') && $update->get('message')->has('entities')){
                
                $this->processCommand($update);
            }
            
        }

        //An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id.
        if ($highestId != -1) {
            $params = [];
            $params['offset'] = $highestId + 1;
            $params['limit'] = 1;
            $telegram->getUpdates($params);
        }
        
    }
    
    /**
     * Processes the Update by running the appropriate command
     * 
     * @param type $update
     * @return bool
     */
    protected function processCommand($update) : bool{
        print_r($update);
        $message = $update->get('message');
        $parts = explode(" ",$message->get('text'));
        
        switch($parts[0]){
            case '/start':    
                app('App\Commands\StartCommand')
                    ->setUpdate($update)
                    ->handle($message->get('chat')->get('id'));
                break;
            case '/getBTCEquivalent':
                $params = array_splice($parts,1);
                app('App\Commands\GetBTCEquivalentCommand')
                    ->setUpdate($update)
                    ->handle($params); //make sure required data is passed
                break;
            case '/getUserID':
                app('App\Commands\GetUserIDCommand')
                    ->setUpdate($update)
                    ->handle($message->get('chat')->get('id')); //make sure required data is passed
            default:
                return false;
        }
        return false;
    }
}
