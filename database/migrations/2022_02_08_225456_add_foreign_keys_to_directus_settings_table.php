<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_settings', function (Blueprint $table) {
            $table->foreign(['project_logo'])->references(['id'])->on('directus_files');
            $table->foreign(['public_foreground'])->references(['id'])->on('directus_files');
            $table->foreign(['public_background'])->references(['id'])->on('directus_files');
            $table->foreign(['storage_default_folder'])->references(['id'])->on('directus_folders')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directus_settings', function (Blueprint $table) {
            $table->dropForeign('directus_settings_project_logo_foreign');
            $table->dropForeign('directus_settings_public_foreground_foreign');
            $table->dropForeign('directus_settings_public_background_foreign');
            $table->dropForeign('directus_settings_storage_default_folder_foreign');
        });
    }
}
