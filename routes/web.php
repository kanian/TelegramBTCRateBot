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

Route::get('/bot-config', 'ConfigBotController@edit')->name('bot-config');
Route::get('/bot-config/{id?}/edit', 'ConfigBotController@edit')->name('bot-config.edit');
Route::patch('/bot-config/{id?}/update', 'ConfigBotController@update')->name('bot-config.update');
Route::get('/bot-config/create', 'ConfigBotController@create')->name('bot-config.create');
Route::post('/bot-config/store', 'ConfigBotController@store')->name('bot-config.store');
Route::post('/{token}/webhook', 'TelegramWebhookController@process')->name('telegramwebhook');
