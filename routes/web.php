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

Route::post(WEBHOOK_ROUTE, 'TelegramWebhookController@process')->name('telegramwebhook');
//Route::post('/450338970AAEw6b2YUpUIUSr72Cf8fuSVeqPq76cbDRo/webhook', 'TelegramWebhookController@process')->name('telegramwebhook');
///450338970:AAEw6b2YUpUIUSr72Cf8fuSVeqPq76cbDRo/webhook