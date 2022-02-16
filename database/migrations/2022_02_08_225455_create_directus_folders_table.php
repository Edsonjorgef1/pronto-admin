<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_folders', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('name');
            $table->char('parent', 36)->nullable()->index('directus_folders_parent_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_folders');
    }
}
