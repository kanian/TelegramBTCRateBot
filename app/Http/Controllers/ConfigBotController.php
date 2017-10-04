<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TelegramBotConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ConfigBotController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    /*public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $botconfigs = TelegramBotConfig::paginate($perPage);
        } else {
            $botconfigs = TelegramBotConfig::paginate($perPage);
        }

        return view('bot-configs.index', compact('botconfigs'));
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bot-configs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        TelegramBotConfig::create($requestData);

        Session::flash('flash_message', 'TelegramBotConfig added!');

        return redirect('bot-configs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    /*public function show($id)
    {
        $botconfig = TelegramBotConfig::findOrFail($id);

        return view('bot-configs.show', compact('botconfig'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id = -1)
    {
        $user = Auth::user();
        // The user might be 
        if($id == -1){
            return redirect('bot-config-create');     
        }
        $botconfig = TelegramBotConfig::findOrFail($id);

        return view('bot-configs.edit', compact('botconfig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $botconfig = TelegramBotConfig::findOrFail($id);
        $botconfig->update($requestData);

        Session::flash('flash_message', 'TelegramBotConfig updated!');

        return redirect('bot-configs@edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    /*public function destroy($id)
    {
        TelegramBotConfig::destroy($id);

        Session::flash('flash_message', 'TelegramBotConfig deleted!');

        return redirect('bot-configs');
    }*/
}
