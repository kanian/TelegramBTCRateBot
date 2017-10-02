<?php
namespace Vendor\App\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Description of StartCommand
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
class StartCommand extends Command {
    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "TelegramBTCRateBot start command";
    
    public function handle($arguments)
    {
        // This will send a message using `sendMessage` method behind the scenes to
        // the user/chat id who triggered this command.
        // `replyWith<Message|Photo|Audio|Video|Voice|Document|Sticker|Location|ChatAction>()` all the available methods are dynamically
        // handled when you replace `send<Method>` with `replyWith` and use the same parameters - except chat_id does NOT need to be included in the array.
        $this->replyWithMessage(['text' => 'Hi! I\'ll provide you with any BTC to any currency amount conversion; here are the available commands:']);

        // Update the chat status to typing...
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        // This will prepare a list of available commands and send the user.
        // First, Get an array of all registered commands
        // They'll be in 'command-name' => 'Command Handler Class' format.
        $commands = $this->getTelegram()->getCommands();

        // Build the list
        $response = '';
        foreach ($commands as $name => $command) {
            $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        // Reply with the commands list
        $this->replyWithMessage(['text' => $response]);

        // Trigger another command dynamically from within this command
        // When you want to chain multiple commands within one or process the request further.
        // The method supports second parameter arguments which you can optionally pass, By default
        // it'll pass the same arguments that are received for this command originally.
        $this->triggerCommand('subscribe');
    }
}
