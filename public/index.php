<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

define('WEBHOOK_ROUTE','/'.env('TELEGRAM_BOT_TOKEN').'/webhook');

// Make sure our Telegram webhooks are registered by starting the webhook service
//app('App\Adapters\TelegramWebHookAdapter');

$telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
// We are supplying a self-signed-certificate
$response = $telegram->setWebhook([
        'url' => 'https://'.HTTP_HOST.WEBHOOK_ROUTE.'/webhook',
        'certificate' => 'btcratebot.crt'
        ]);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);



$response->send();

$kernel->terminate($request, $response);
