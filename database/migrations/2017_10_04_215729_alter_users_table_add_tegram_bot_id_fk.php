<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableAddTegramBotIdFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('telegram_bot_config_id')->nullable()->unsigned();

            $table->foreign('telegram_bot_config_id')->references('id')->on('telegram_bot_configs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_telegram_bot_config_id_foreign');  
            $table->dropColumn('telegram_bot_config_id');
        });
    }
}
