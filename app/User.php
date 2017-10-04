<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * The User's TelegramBotConfig ID (Foreign key) 
     * 
     * @var int  
     */
    public  $telegramBotConfigId;
    
    /**
     * The Telegram bot configuration for this user.
     *
     * @var array
     */
    public function telegramBotConfig(){
        return $this->hasOne('App\TelegramBotConfig');
    }
}
