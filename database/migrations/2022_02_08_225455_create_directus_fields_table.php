<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('collection', 64)->index('directus_fields_collection_foreign');
            $table->string('field', 64);
            $table->string('special', 64)->nullable();
            $table->string('interface', 64)->nullable();
            $table->longText('options')->nullable();
            $table->string('display', 64)->nullable();
            $table->longText('display_options')->nullable();
            $table->boolean('readonly')->default(false);
            $table->boolean('hidden')->default(false);
            $table->unsignedInteger('sort')->nullable();
            $table->string('width', 30)->nullable()->default('full');
            $table->longText('translations')->nullable();
            $table->text('note')->nullable();
            $table->longText('conditions')->nullable();
            $table->boolean('required')->nullable()->default(false);
            $table->string('group', 64)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_fields');
    }
}
