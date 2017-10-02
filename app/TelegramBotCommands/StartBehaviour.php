<?php
namespace Vendor\App\Behaviours;


/**
 * Description of StartCommand
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class StartBehaviour {
    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "TelegramBTCRateBot start command";
    
    private $telegram = NULL;
    
    public function __construct() {
        $this->_telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
    }
    
    public function handle($arguments)
    {
        // This will send a message using `sendMessage` method behind the scenes to
        // the user/chat id who triggered this command.
        // `replyWith<Message|Photo|Audio|Video|Voice|Document|Sticker|Location|ChatAction>()` all the available methods are dynamically
        // handled when you replace `send<Method>` with `replyWith` and use the same parameters - except chat_id does NOT need to be included in the array.
        //$this->replyWithMessage(['text' => 'Hi! I\'ll provide you with any BTC to any currency amount conversion; here are the available commands:']);

        $this->telegram->sendMessage([
            'chat_id' => '@patrick_telegram_btc_rate_bot', 
            'text' => 'Hi! I\'ll provide you with any BTC to any currency amount conversion; here are the available commands:'
          ]);
        

    }
}
