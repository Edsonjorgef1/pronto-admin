<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_dashboards', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('name');
            $table->string('icon', 30)->default('dashboard');
            $table->text('note')->nullable();
            $table->timestamp('date_created')->useCurrent();
            $table->char('user_created', 36)->nullable()->index('directus_dashboards_user_created_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_dashboards');
    }
}
