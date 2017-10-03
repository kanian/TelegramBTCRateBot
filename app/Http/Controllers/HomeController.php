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
        //app('App\Adapters\TelegramManualUpdateAdapter')->getUpdates();
        $telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        $update = $telegram->getUpdates();
        print_r(count($update)) . '\n';
        print_r($update[0]->getMessage()->get('text'));
        /*for($i = 0;$i< count($update);$i++){
            
        }*/
        return view('home');
    }
}
