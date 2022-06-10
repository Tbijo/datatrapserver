<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccasionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occasion')->insert([
            'occasion' => 1,
            'localityID' => 1,
            'sessionID' => 1,
            'methodID' => 1,
            'methodTypeID' => 1,
            'trapTypeID' => 1,
            'envTypeID' => null,
            'vegetTypeID' => null,
            'gotCaught' => true,
            'numTraps' => 2,
            'numMice' => 2,
            'temperature' => null,
            'weather' => null,
            'leg' => 'root',
            'note' => null,
            'occasionStart' => 1654877183,
            'created_at' =>  '2022-06-01 14:06:13',
            'updated_at' => '2022-06-01 14:06:13'
        ]);

        DB::table('occasion')->insert([
            'occasion' => 2,
            'localityID' => 2,
            'sessionID' => 2,
            'methodID' => 2,
            'methodTypeID' => 2,
            'trapTypeID' => 2,
            'envTypeID' => null,
            'vegetTypeID' => null,
            'gotCaught' => true,
            'numTraps' => 2,
            'numMice' => 2,
            'temperature' => null,
            'weather' => null,
            'leg' => 'root',
            'note' => null,
            'occasionStart' => 1654877184,
            'created_at' =>  '2022-06-01 14:06:13',
            'updated_at' => '2022-06-01 14:06:13'
        ]);
    }
}
