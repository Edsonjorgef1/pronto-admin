<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_roles', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('name', 100);
            $table->string('icon', 30)->default('supervised_user_circle');
            $table->text('description')->nullable();
            $table->text('ip_access')->nullable();
            $table->boolean('enforce_tfa')->default(false);
            $table->boolean('admin_access')->default(false);
            $table->boolean('app_access')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_roles');
    }
}
