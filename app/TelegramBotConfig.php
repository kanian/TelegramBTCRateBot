<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelegramBotConfig extends Model
{
    
    /**
    * The default currency of this bot 
    *
    * @var array
    */
    public $defaultCurrency;
    /**
     * The Telegram username of the user
     *
     * @var array
     */
    public $telegramUserName;
    /**
     * The Telegram user_id of the user
     *
     * @var array
     */
    public $telegramUserId;
    
    /**
     * The User id (Foreign key)
     * 
     * @var string 
     */
    public $userId;
     /**
     * Get the user that owns this configuration.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
