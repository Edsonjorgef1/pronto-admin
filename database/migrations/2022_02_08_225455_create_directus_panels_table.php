<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_panels', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('dashboard', 36)->index('directus_panels_dashboard_foreign');
            $table->string('name')->nullable();
            $table->string('icon', 30)->nullable()->default('insert_chart');
            $table->string('color', 10)->nullable();
            $table->boolean('show_header')->default(false);
            $table->text('note')->nullable();
            $table->string('type');
            $table->integer('position_x');
            $table->integer('position_y');
            $table->integer('width');
            $table->integer('height');
            $table->longText('options')->nullable();
            $table->timestamp('date_created')->useCurrent();
            $table->char('user_created', 36)->nullable()->index('directus_panels_user_created_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_panels');
    }
}
