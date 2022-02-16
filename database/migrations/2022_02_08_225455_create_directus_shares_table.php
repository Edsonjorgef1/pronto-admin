<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_shares', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('name')->nullable();
            $table->string('collection', 64)->nullable()->index('directus_shares_collection_foreign');
            $table->string('item')->nullable();
            $table->char('role', 36)->nullable()->index('directus_shares_role_foreign');
            $table->string('password')->nullable();
            $table->char('user_created', 36)->nullable()->index('directus_shares_user_created_foreign');
            $table->timestamp('date_created')->useCurrent();
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->integer('times_used')->nullable()->default(0);
            $table->integer('max_uses')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_shares');
    }
}
