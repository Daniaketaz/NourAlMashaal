<?php

namespace Database\Seeders;

use App\Models\week_s_day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaysOfWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        week_s_day::create(['id'=>1 ,'day'=>'MO' ,'schedual_id'=>'1']);
        week_s_day::create(['id'=>2,'day'=>'TU','schedual_id'=>'1']);
        week_s_day::create(['id'=>3 ,'day'=>'WE','schedual_id'=>'2']);
        week_s_day::create(['id'=>4,'day'=>'FR','schedual_id'=>'1']);
        week_s_day::create(['id'=>5 ,'day'=>'SU','schedual_id'=>'1']);
    }
}
