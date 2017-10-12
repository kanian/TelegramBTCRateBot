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
    
    /**
     * Handle the command
     * 
     * @param type $argsArray
     * @param type $retries
     */
    public function handle($argsArray, $retries = 0) {
         
        $coindesk = app('App\Adapters\CoinDeskAdapter');
        $amount = $argsArray[0];
        
        if(count($argsArray) === 2 && isset($argsArray[1]))
        {
            $currency = $argsArray[1];
        }else{
            //Let's get the user default currancy from his bot config
            $sender = collect([$this->getUpdate()])
                    ->map(function ($item, $key) { 
                        return $item->getMessage()->getFrom();
                    })
                    ->first(function ($update, $key) {
                        return array_key_exists('username', $update->toArray());
                    });
            if($sender !== NULL){
                $username = sender['username'];
                $config = \App\TelegramBotConfig::where('telegram_user_name',$username)->first();
                $currency = $config->default_currency;
            } else{
                // There are no default currency set for this user; let's assume USD
                $currency = 'USD';
            }
        }
        //get the chat id
        $chat_id = $this->getUpdate()->get('message')->get('chat')->get('id');
         
        if($retries == 0){
            try{
            // Update the chat status to typing...
            $this->replyWithChatAction(['chat_id' => $chat_id, 'action' => Actions::TYPING]);
            } catch (GuzzleHttp\Exception\ClientException $ex) {
               //do nothing here, for now... Telegram keeps saying no chat_id is present, when it still processes
               //our sendMessage 
            }
        }
         
         
         
         // Get rate
        try{
            $rate = $coindesk->getCurrentBTCRate($currency);
            // Compute coversion
            $conversion = floatval($argsArray[0]) / $rate;
            //30 USD is 0.08 BTC (760.45 USD - 1 BTC)
            $reply = sprintf('%u %s is %f BTC(%f %s - 1 BTC)' . PHP_EOL, $amount,$currency,$conversion,$rate,$currency);

            // Send rate 
            $this->replyWithMessage(['chat_id' => $chat_id,'text' => $reply]);
        } catch (GuzzleHttp\Exception\ConnectException $ex) {
            if($retries < 3)
            {
                usleep(2000000);
                $retries++;
                $this->handle($argsArray, $retries);
            }
            else{
                // Ask user to try again later; CoinDesk API service might be down
                $this->replyWithMessage(['chat_id' => $chat_id,'text' => 'Aplogies, the conversion service is down. Try again later.']);
            }
            

        }
         
         
    }

    
    
}
