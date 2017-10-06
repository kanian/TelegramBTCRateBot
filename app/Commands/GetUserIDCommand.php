<?php

namespace App\Commands;

use Illuminate\Support\Facades\Auth;
use Telegram\Bot\Actions;
use App\Commands\Command;

/**
 * Command that returns the current user's ID to the bot
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class GetUserIDCommand extends TelegramBotCommand {
    
    /**
     * @var string Command Name
     */
    protected $name = "getUserID";

    /**
     * @var string Command Description
     */
    protected $description = "Returns your paybee user_id";
    
    public function handle($chat_id)
    //public function handle($parameters)
    {
        $config = \App\TelegramBotConfig::where('user_id', Auth::user()->id)->get()[0];
         // Update the chat status to typing...
        $this->replyWithChatAction(['chat_id' => $chat_id, 'action' => Actions::TYPING]);
        if($config->telegram_user_id===NULL){
            $text = "Please follow these instructions...";
        }
        $text = $config->telegram_user_id===NULL 
                ? "Please follow these instructions..."
                : $config->telegram_user_id;
        
        try{
            $this->replyWithMessage([
            'chat_id' => $chat_id,
            'text' => $text, 
            //'chat_id' => $chat_id])
            ]);
        } catch (GuzzleHttp\Exception\ClientException $ex) {
            //do nothing here, for now... Telegram keeps saying no chat_id is present, when it still processes
            //our sendMessahe 
        }
        
    }
    
}
