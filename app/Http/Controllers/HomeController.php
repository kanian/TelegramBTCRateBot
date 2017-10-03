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
        app('App\Adapters\TelegramManualUpdateAdapter')->getUpdates();
        $telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        $updates = $telegram->getUpdates();
        print_r($updates) . '\n';
        
        print_r($updates[0]->getMessage()->get('entities'));
        for($i = 0;$i< count($updates);$i++){
            if($updates[$i]->has('message') && $updates[$i]->get('message')->has('entities')){
                
                $this->processCommand($updates[$i]);
            }
            
        }
        /*foreach ($updates as $update) {
            $highestId = $update->getUpdateId();
            $telegram->processCommand($update);
        }
        //An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id.
        if ($highestId != -1) {
            $params = [];
            $params['offset'] = $highestId + 1;
            $params['limit'] = 1;
            $telegram->getUpdates($params);
        }*/
        return view('home');
    }
    
    private function processCommand($update) : bool{
        $message = $update->get('message');
        $parts = explode(" ",$message->get('text'));
        
        //print_r($message->get('chat')->get('id'));
        switch($parts[0]){
            case '/start':
                
                app('App\Commands\StartCommand')
                    ->setUpdate($update)
                    ->handle($message->get('chat')->get('id'));
                
                break;
            case '/getBTCEquivalent':
                break;
            default:
                return false;
        }
        return false;
    }
}
