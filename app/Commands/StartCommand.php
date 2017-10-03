<?php
namespace App\Commands;

use Telegram\Bot\Actions;
use App\Commands\Command;
//use Telegram\Bot\Commands\Command;

/**
 * Description of StartCommand
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class StartCommand extends TelegramBotCommand {
    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "TelegramBTCRateBot start command";
    
    
    
    public function handle($chat_id)
    //public function handle($parameters)
    {
        //echo $chat_id;
        //die;
        // This will send a message using `sendMessage` method behind the scenes to
        // the user/chat id who triggered this command.
        // `replyWith<Message|Photo|Audio|Video|Voice|Document|Sticker|Location|ChatAction>()` all the available methods are dynamically
        // handled when you replace `send<Method>` with `replyWith` and use the same parameters - except chat_id does NOT need to be included in the array.
        
        try{
            $this->replyWithMessage([
            'chat_id' => $chat_id,
            'text' => 'Hi! I will provide you with any BTC to any currency amount conversion; here are the available commands:', 
            //'chat_id' => $chat_id])
            ]);
        } catch (GuzzleHttp\Exception\ClientException $ex) {
            //do nothing ehre, for now... Telegram keeps saying no chat_id is present, when it still processes
            //our sendMessahe 
        }
        
            //patrick_telegram_btc_rate_bot

        // Update the chat status to typing...
        $this->replyWithChatAction(['chat_id' => $chat_id, 'action' => Actions::TYPING]);

        // This will prepare a list of available commands and send the user.
        // First, Get an array of all registered commands
        // They'll be in 'command-name' => 'Command Handler Class' format.
        $commands = $this->getCommandBus()->getCommands();
        //$commands = $this->getTelegram()->getCommands();
        print_r($commands) ;
        //die;

        // Build the list
        $response = '';
        foreach ($commands as $name => $command) {
            $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        // Reply with the commands list
        $this->replyWithMessage(['chat_id' => $chat_id, 'text' => $response]);

        // Trigger another command dynamically from within this command
        // When you want to chain multiple commands within one or process the request further.
        // The method supports second parameter arguments which you can optionally pass, By default
        // it'll pass the same arguments that are received for this command originally.
        //$this->triggerCommand('subscribe');
    }
}
