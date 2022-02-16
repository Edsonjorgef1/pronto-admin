<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_collections', function (Blueprint $table) {
            $table->string('collection', 64)->primary();
            $table->string('icon', 30)->nullable();
            $table->text('note')->nullable();
            $table->string('display_template')->nullable();
            $table->boolean('hidden')->default(false);
            $table->boolean('singleton')->default(false);
            $table->longText('translations')->nullable();
            $table->string('archive_field', 64)->nullable();
            $table->boolean('archive_app_filter')->default(true);
            $table->string('archive_value')->nullable();
            $table->string('unarchive_value')->nullable();
            $table->string('sort_field', 64)->nullable();
            $table->string('accountability')->nullable()->default('all');
            $table->string('color')->nullable();
            $table->longText('item_duplication_fields')->nullable();
            $table->integer('sort')->nullable();
            $table->string('group', 64)->nullable()->index('directus_collections_group_foreign');
            $table->string('collapse')->default('open');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_collections');
    }
}
