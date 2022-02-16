<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusPresetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_presets', function (Blueprint $table) {
            $table->foreign(['role'])->references(['id'])->on('directus_roles')->onDelete('CASCADE');
            $table->foreign(['user'])->references(['id'])->on('directus_users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directus_presets', function (Blueprint $table) {
            $table->dropForeign('directus_presets_role_foreign');
            $table->dropForeign('directus_presets_user_foreign');
        });
    }
}
