<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        \App\Models\AdminUser::factory(1)->create();
        $this->call([
            ArticleSeeder::class
        ]);
    }
}
