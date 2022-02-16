<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_folders', function (Blueprint $table) {
            $table->foreign(['parent'])->references(['id'])->on('directus_folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directus_folders', function (Blueprint $table) {
            $table->dropForeign('directus_folders_parent_foreign');
        });
    }
}
