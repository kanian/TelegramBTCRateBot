<?php
define('HTTP_HOST', filter_input(INPUT_SERVER, 'HTTP_HOST'));
define('TELEGRAM_BOT_TOKEN','450338970:AAEw6b2YUpUIUSr72Cf8fuSVeqPq76cbDRo');
define('WEBHOOK_ROUTE','/'.TELEGRAM_BOT_TOKEN.'/webhook');