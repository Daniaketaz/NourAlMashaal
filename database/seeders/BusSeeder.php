<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Bus')->insert([
            ['id'=>1],
//           ['bus_number'=>'ejhre']
//           ,['driver_name'=>'ff']
//            ,['driver_mobile'=>122]
        ]);
    }
}
