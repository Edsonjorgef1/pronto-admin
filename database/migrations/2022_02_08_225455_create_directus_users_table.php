<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectusUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directus_users', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('email', 128)->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('location')->nullable();
            $table->string('title', 50)->nullable();
            $table->text('description')->nullable();
            $table->longText('tags')->nullable();
            $table->char('avatar', 36)->nullable();
            $table->string('language', 8)->nullable()->default('en-US');
            $table->string('theme', 20)->nullable()->default('auto');
            $table->string('tfa_secret')->nullable();
            $table->string('status', 16)->default('active');
            $table->char('role', 36)->nullable()->index('directus_users_role_foreign');
            $table->string('token')->nullable()->unique();
            $table->timestamp('last_access')->useCurrentOnUpdate()->useCurrent();
            $table->string('last_page')->nullable();
            $table->string('provider', 128)->default('default');
            $table->string('external_identifier')->nullable()->unique();
            $table->longText('auth_data')->nullable();
            $table->boolean('email_notifications')->nullable()->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directus_users');
    }
}
