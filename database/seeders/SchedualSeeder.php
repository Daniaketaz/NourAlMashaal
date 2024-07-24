<?php

namespace Database\Seeders;

use App\Models\Schedual;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchedualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedual::create(['id'=>1,'classNumber_id'=>1]);
        Schedual::create(['id'=>2,'classNumber_id'=>2]);
    }
}
