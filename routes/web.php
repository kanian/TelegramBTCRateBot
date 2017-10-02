<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/'.config('services.telegram.bot_token').'/webhook', function () {
    $update = Telegram::commandsHandler(true);
	
	// Commands handler method returns an Update object.
	// So you can further process $update object 
	// to however you want.
	
    return 'ok';
});
