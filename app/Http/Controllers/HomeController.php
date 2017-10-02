<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        //$telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        //$response = $telegram->getMe();
        //$updates = $telegram->getUpdates();
        //$message_count = count($updates);
        //$botId = $response->getId();
        //$firstName = $response->getFirstName();
        //$username = $response->getUsername();
        //$setwebhookurl = 'https://'.HTTP_HOST.WEBHOOK_ROUTE;
        $setwebhookurl = 'https://';
        return view('home' ,['setwebhookurl'=>$setwebhookurl]);
    }
}
