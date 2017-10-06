<?php

namespace App\Listeners;

use App\Events\UpdatesWereReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveTelegramUserID
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UpdatesWereReceived  $event
     * @return void
     */
    public function handle(UpdatesWereReceived $event)
    {
       
        $sender = collect($event->updates)->first(function ($update, $key) {
                        
                        
                        return array_key_exists('username', $update->toArray());
                    });
        
        $username = $sender['username'];
        $config = \App\TelegramBotConfig::where('telegram_user_name',$username)->first();
        
        if($config !==null){
            $config->update(['telegram_user_id'=>$sender['id']]);
        }
            

    }
}
