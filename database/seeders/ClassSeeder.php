<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\classs;
class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        classs::create(['id'=>1 ,'super_teacher_id'=>1,'name'=>'KG1']);
        classs::create(['id'=>2,'super_teacher_id'=>2,'name'=>'KG2']);
        classs::create(['id'=>3,'super_teacher_id'=>3 ,'name'=>'KG3']);

    }
}
