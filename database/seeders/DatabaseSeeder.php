<?php

namespace Database\Seeders;

use App\Models\Group;
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
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            GroupSeeder::class,
            PostSeeder::class,
            DefaultImagesSeeder::class

        ]);
    }
}
