<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project')->insert([
            'projectName' => 'Project1',
            'numLocal' => 1,
            'numMice' => 2,
            'projectStart' => 1654877183,
            'created_at' =>  '2022-06-01 14:06:13',
            'updated_at' => '2022-06-01 14:06:13'
        ]);

        DB::table('project')->insert([
            'projectName' => 'Project2',
            'numLocal' => 1,
            'numMice' => 2,
            'projectStart' => 1654877184,
            'created_at' =>  '2022-06-01 14:06:13',
            'updated_at' => '2022-06-01 14:06:13'
        ]);
    }
}
