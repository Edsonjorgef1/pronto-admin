<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('production')) {
            abort(500, "Never gonna let you down!");
        }

        \App\Models\User::factory(1)->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
