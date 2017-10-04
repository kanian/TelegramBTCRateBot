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
        $this->processUpdates();
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
    
    private function processUpdates(){
        app('App\Adapters\TelegramManualUpdateAdapter')->getUpdates();
        $telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        $updates = $telegram->getUpdates();
        //print_r($updates) . '\n';
        $highestId = -1;

        foreach ($updates as $update) {
            $highestId = $update->getUpdateId();
            if($update->has('message') && $update->get('message')->has('entities')){
                
                $this->processCommand($update);
            }
            
        }

        //An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id.
        if ($highestId != -1) {
            $params = [];
            $params['offset'] = $highestId + 1;
            $params['limit'] = 1;
            $telegram->getUpdates($params);
        }
        //print_r($updates[0]->getMessage()->get('entities'));
        /*for($i = 0;$i< count($updates);$i++){
            if($updates[$i]->has('message') && $updates[$i]->get('message')->has('entities')){
                
                $this->processCommand($updates[$i]);
            }
            
        }*/
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
                $params = array_splice($parts,1);
                app('App\Commands\GetBTCEquivalentCommand')
                    ->setUpdate($update)
                    ->handle($params); //make sure required data is passed
                break;
            default:
                return false;
        }
        return false;
    }
}
