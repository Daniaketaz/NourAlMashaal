<?php

namespace Database\Seeders;

use App\Models\class_number;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        class_number::create(['id'=>1 ,'ClassNumber'=>1,'classs_id'=>1]);
        class_number::create(['id'=>2,'ClassNumber'=>1,'classs_id'=>2]);
        class_number::create(['id'=>3 ,'ClassNumber'=>2,'classs_id'=>1]);
    }
}
