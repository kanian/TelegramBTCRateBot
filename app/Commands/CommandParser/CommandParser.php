<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Vendor\App\Commands\CommandParsers;

/**
 * Description of CommandParser
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class CommandParser {
    
    public function __construct(string $command){
        
        $parts = explode(" ",$command);
        switch($parts[0]){
            case "/start":
                
        }
    }
}