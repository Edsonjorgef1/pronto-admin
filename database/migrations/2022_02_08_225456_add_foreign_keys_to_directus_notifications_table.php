<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_notifications', function (Blueprint $table) {
            $table->foreign(['recipient'])->references(['id'])->on('directus_users')->onDelete('CASCADE');
            $table->foreign(['sender'])->references(['id'])->on('directus_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directus_notifications', function (Blueprint $table) {
            $table->dropForeign('directus_notifications_recipient_foreign');
            $table->dropForeign('directus_notifications_sender_foreign');
        });
    }
}
