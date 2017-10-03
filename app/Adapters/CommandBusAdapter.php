<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Adapters;

use Telegram\Bot\Commands\CommandBus;
/**
 * Description of CommandBusAdapter
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class CommandBusAdapter {
    private static $command_bus = NULL;
    public function __construct() {
        if(CommandBusAdapter::$command_bus == NULL){
            CommandBusAdapter::$command_bus = new CommandBus(app('App\Adapters\TelegramBotApiAdapter')->Instance());    
            CommandBusAdapter::$command_bus->addCommands(
                    [
                        \Telegram\Bot\Commands\HelpCommand::class,
                        \App\Commands\StartCommand::class,
                        \App\Commands\GetBTCEquivalentCommand::class,
                    ]
                    );
        }
        
    }
    
    public function Instance(){
        return CommandBusAdapter::$command_bus;
    }
}
