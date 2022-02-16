<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_panels', function (Blueprint $table) {
            $table->foreign(['dashboard'])->references(['id'])->on('directus_dashboards')->onDelete('CASCADE');
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
        Schema::table('directus_panels', function (Blueprint $table) {
            $table->dropForeign('directus_panels_dashboard_foreign');
            $table->dropForeign('directus_panels_user_created_foreign');
        });
    }
}
