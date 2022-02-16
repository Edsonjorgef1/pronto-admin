<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_files', function (Blueprint $table) {
            $table->foreign(['modified_by'])->references(['id'])->on('directus_users');
            $table->foreign(['folder'])->references(['id'])->on('directus_folders')->onDelete('SET NULL');
            $table->foreign(['uploaded_by'])->references(['id'])->on('directus_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directus_files', function (Blueprint $table) {
            $table->dropForeign('directus_files_modified_by_foreign');
            $table->dropForeign('directus_files_folder_foreign');
            $table->dropForeign('directus_files_uploaded_by_foreign');
        });
    }
}
