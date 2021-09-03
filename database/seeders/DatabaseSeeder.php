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
        $this->call([
            VarsitySeeder::class,
            UserSeeder::class,
            DepartmentSeeder::class,
            LabSeeder::class,
            PostSeeder::class,
        ]);
    }
}
