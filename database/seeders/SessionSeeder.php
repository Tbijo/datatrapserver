<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('session')->insert([
            'session' => 1,
            'projectID' => 1,
            'numOcc' => 1,
            'sessionStart' => 1654877183,
            'created_at' =>  '2022-06-01 14:06:13',
            'updated_at' => '2022-06-01 14:06:13'
        ]);

        DB::table('session')->insert([
            'session' => 2,
            'projectID' => 2,
            'numOcc' => 1,
            'sessionStart' => 1654877184,
            'created_at' =>  '2022-06-01 14:06:13',
            'updated_at' => '2022-06-01 14:06:13'
        ]);
    }
}
