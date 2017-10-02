<?php

namespace Vendor\App\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
/**
 * Description of GetBTCEquivalent
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class GetBTCEquivalentCommand extends Command {
    /**
     * @var string Command Name
     */
    protected $name = "getBTCEquivalent";
    
    /**
     * @var string Command Description
     */
    protected $description = "Get the equivalent in BTC for the currency amount; Ex: /getBTCEquivalent 30 USD";
    
    public function handle($arguments) {
         $coindesk = app('App\Adapters\CoinDeskAdapter');
         $argsArray = explode(" ",$arguments);
         $amount = $argsArray[0];
         $currency = $argsArray[1];
         
         // Get rate
         $rate = $coindesk->getCurrentBTCRate($currency);
         // Compute coversion
         $conversion = floatval($argsArray[0]) / $rate;
         //30 USD is 0.08 BTC (760.45 USD - 1 BTC)
         sprintf('%u %s is %f BTC(%f %s - 1 BTC)' . PHP_EOL, $amount,$currency,$conversion,$rate,$currency);
        
         // Send rate 
         $this->replyWithMessage(['text' => $conversion]);
    }

    
    
}
