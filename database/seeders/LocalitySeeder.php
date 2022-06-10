<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locality')->insert([
            'localityName' => 'Locality1',
            'xA' => null,
            'yA' => null,
            'xB' => null,
            'yB' => null,
            'numSessions' => 1,
            'note' => null,
            'created_at' => '2022-06-01 14:06:13',
            'updated_at' => '2022-06-01 14:06:13'
        ]);

        DB::table('locality')->insert([
            'localityName' => 'Locality2',
            'xA' => null,
            'yA' => null,
            'xB' => null,
            'yB' => null,
            'numSessions' => 1,
            'note' => null,
            'created_at' => '2022-06-01 14:06:13',
            'updated_at' => '2022-06-01 14:06:13'
        ]);
    }
}
