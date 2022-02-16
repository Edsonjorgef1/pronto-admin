<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action', 45);
            $table->char('user', 36)->nullable();
            $table->timestamp('timestamp')->useCurrent();
            $table->string('ip', 50);
            $table->string('user_agent')->nullable();
            $table->string('collection', 64)->index('directus_activity_collection_foreign');
            $table->string('item');
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_activity');
    }
}
