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
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $response = $telegram->getMe();

        //$botId = $response->getId();
        //$firstName = $response->getFirstName();
        //$username = $response->getUsername();
        return view('home')/*->with(array('botId'=>$botId, '$firstName' => $firstName))*/;
    }
}
