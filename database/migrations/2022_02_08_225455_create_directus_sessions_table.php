<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_sessions', function (Blueprint $table) {
            $table->string('token', 64)->primary();
            $table->char('user', 36)->nullable()->index('directus_sessions_user_foreign');
            $table->timestamp('expires')->useCurrentOnUpdate()->useCurrent();
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->char('share', 36)->nullable()->index('directus_sessions_share_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_sessions');
    }
}
