<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TelegramManualUpdateCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TelegramManualUpdate:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually get Telegram updates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         app('App\Adapters\TelegramManualUpdateAdapter')->getUpdates();
    }
}
