<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_permissions', function (Blueprint $table) {
            $table->foreign(['role'])->references(['id'])->on('directus_roles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directus_permissions', function (Blueprint $table) {
            $table->dropForeign('directus_permissions_role_foreign');
        });
    }
}
