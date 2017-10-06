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
    public $default_currency;
    /**
     * The Telegram username of the user
     *
     * @var array
     */
    public $telegram_user_name;
    /**
     * The Telegram user_id of the user
     *
     * @var array
     */
    public $telegram_user_id;
    
    /**
     * The User id (Foreign key)
     * 
     * @var string 
     */
    public $user_id;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'default_currency', 'telegram_user_name', 'telegram_user_id','user_id'
    ];
    
    /*protected $visible  = [
        'default_currency', 'telegram_user_name', 'telegram_user_id','user_id'
    ];*/
    
    public function getTelegramUserName(){
        return $this->telegram_user_name;
    }
     /**
     * Get the user that owns this configuration.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
