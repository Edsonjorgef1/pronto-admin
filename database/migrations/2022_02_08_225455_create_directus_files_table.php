<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_files', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('storage');
            $table->string('filename_disk')->nullable();
            $table->string('filename_download');
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->char('folder', 36)->nullable()->index('directus_files_folder_foreign');
            $table->char('uploaded_by', 36)->nullable()->index('directus_files_uploaded_by_foreign');
            $table->timestamp('uploaded_on')->useCurrent();
            $table->char('modified_by', 36)->nullable()->index('directus_files_modified_by_foreign');
            $table->timestamp('modified_on')->useCurrent();
            $table->string('charset', 50)->nullable();
            $table->bigInteger('filesize')->nullable();
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('duration')->nullable();
            $table->string('embed', 200)->nullable();
            $table->text('description')->nullable();
            $table->text('location')->nullable();
            $table->text('tags')->nullable();
            $table->longText('metadata')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_files');
    }
}
