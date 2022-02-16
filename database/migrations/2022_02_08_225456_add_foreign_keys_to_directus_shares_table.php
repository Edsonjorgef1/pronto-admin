<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDirectusSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directus_shares', function (Blueprint $table) {
            $table->foreign(['collection'])->references(['collection'])->on('directus_collections')->onDelete('CASCADE');
            $table->foreign(['user_created'])->references(['id'])->on('directus_users')->onDelete('SET NULL');
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
        Schema::table('directus_shares', function (Blueprint $table) {
            $table->dropForeign('directus_shares_collection_foreign');
            $table->dropForeign('directus_shares_user_created_foreign');
            $table->dropForeign('directus_shares_role_foreign');
        });
    }
}
