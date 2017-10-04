<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTelegramBotConfigsTableTelegramUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('telegram_bot_configs', function (Blueprint $table) {
            $table->string('telegram_user_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('telegram_bot_configs', function (Blueprint $table) {
            $table->string('telegram_user_id')->change();
        });
    }
}
