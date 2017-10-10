<?php
define('HTTP_HOST', filter_input(INPUT_SERVER, 'HTTP_HOST'));
define('TELEGRAM_BOT_TOKEN','450338970:AAEw6b2YUpUIUSr72Cf8fuSVeqPq76cbDRo');
define('API_URL','https://api.telegram.org/bot'.TELEGRAM_BOT_TOKEN.'/');
define('RANDOM_TOKEN','CG5X6CWB79LLGQI0N4BQLPUIJQHBAO25T4R934HX');
define('WEBHOOK_ROUTE','/'. RANDOM_TOKEN . '/webhook');
//define('WEBHOOK_ROUTE','/'. TELEGRAM_BOT_TOKEN . '/webhook');

