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
            ProjectSeeder::class,
            SessionSeeder::class,
            LocalitySeeder::class,
            OccasionSeeder::class,
            MouseSeeder::class,
//            EnvTypeSeeder::class,
//            MethodSeeder::class,
//            MethodTypeSeeder::class,
//            ProtocolSeeder::class,
//            TrapTypeSeeder::class,
//            VegetTypeSeeder::class,
//            SpecieSeeder::class
        ]);
    }
}
