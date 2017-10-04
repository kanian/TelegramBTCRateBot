<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTelegramBotConfigsTableAddUserIdFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('telegram_bot_configs', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->unsigned();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            
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
            $table->dropForeign('telegram_bot_configs_user_id_foreign');  
            $table->dropColumn('user_id');
        });
        
    }
}
