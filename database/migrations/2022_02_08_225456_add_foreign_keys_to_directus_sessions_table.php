<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_sessions', function (Blueprint $table) {
            $table->foreign(['share'])->references(['id'])->on('directus_shares')->onDelete('CASCADE');
            $table->foreign(['user'])->references(['id'])->on('directus_users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directus_sessions', function (Blueprint $table) {
            $table->dropForeign('directus_sessions_share_foreign');
            $table->dropForeign('directus_sessions_user_foreign');
        });
    }
}
