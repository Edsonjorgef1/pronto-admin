<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name', 100)->default('Directus');
            $table->string('project_url')->nullable();
            $table->string('project_color', 10)->nullable()->default('#00C897');
            $table->char('project_logo', 36)->nullable()->index('directus_settings_project_logo_foreign');
            $table->char('public_foreground', 36)->nullable()->index('directus_settings_public_foreground_foreign');
            $table->char('public_background', 36)->nullable()->index('directus_settings_public_background_foreign');
            $table->text('public_note')->nullable();
            $table->unsignedInteger('auth_login_attempts')->nullable()->default('25');
            $table->string('auth_password_policy', 100)->nullable();
            $table->string('storage_asset_transform', 7)->nullable()->default('all');
            $table->longText('storage_asset_presets')->nullable();
            $table->text('custom_css')->nullable();
            $table->char('storage_default_folder', 36)->nullable()->index('directus_settings_storage_default_folder_foreign');
            $table->longText('basemaps')->nullable();
            $table->string('mapbox_key')->nullable();
            $table->longText('module_bar')->nullable();
            $table->string('project_descriptor', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_settings');
    }
}
