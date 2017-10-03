<?php

namespace App\Commands;

use Telegram\Bot\Actions;
use App\Commands\Command;
/**
 * Description of GetBTCEquivalent
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class GetBTCEquivalentCommand extends TelegramBotCommand {
    /**
     * @var string Command Name
     */
    protected $name = "getBTCEquivalent";
    
    /**
     * @var string Command Description
     */
    protected $description = "Get the equivalent in BTC for the currency amount; Ex: /getBTCEquivalent 30 USD";
    
    public function handle($argsArray) {
         
         $coindesk = app('App\Adapters\CoinDeskAdapter');
         //$argsArray = explode(" ",$arguments);
         $amount = $argsArray[0];
         $currency = $argsArray[1];
         
         //get the chat id
         $chat_id = $this->getUpdate()->get('message')->get('chat')->get('id');
         
         try{
            // Update the chat status to typing...
            $this->replyWithChatAction(['chat_id' => $chat_id, 'action' => Actions::TYPING]);
         } catch (GuzzleHttp\Exception\ClientException $ex) {
            //do nothing here, for now... Telegram keeps saying no chat_id is present, when it still processes
            //our sendMessahe 
        }
         
         
         // Get rate
         $rate = $coindesk->getCurrentBTCRate($currency);
         // Compute coversion
         $conversion = floatval($argsArray[0]) / $rate;
         //30 USD is 0.08 BTC (760.45 USD - 1 BTC)
         sprintf('%u %s is %f BTC(%f %s - 1 BTC)' . PHP_EOL, $amount,$currency,$conversion,$rate,$currency);
        
         // Send rate 
         $this->replyWithMessage(['chat_id' => $chat_id,'text' => $conversion]);
    }

    
    
}
