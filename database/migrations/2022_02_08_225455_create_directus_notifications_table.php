<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('timestamp')->useCurrentOnUpdate()->useCurrent();
            $table->string('status')->nullable()->default('inbox');
            $table->char('recipient', 36)->index('directus_notifications_recipient_foreign');
            $table->char('sender', 36)->index('directus_notifications_sender_foreign');
            $table->string('subject');
            $table->text('message')->nullable();
            $table->string('collection', 64)->nullable();
            $table->string('item')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_notifications');
    }
}
