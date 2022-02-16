<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_dashboards', function (Blueprint $table) {
            $table->foreign(['user_created'])->references(['id'])->on('directus_users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directus_dashboards', function (Blueprint $table) {
            $table->dropForeign('directus_dashboards_user_created_foreign');
        });
    }
}
