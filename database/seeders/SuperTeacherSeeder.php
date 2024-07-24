<?php

namespace Database\Seeders;

use App\Models\SuperTeacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuperTeacher::create(['id'=>1,'user_id'=>3]);
        SuperTeacher::create(['id'=>2,'user_id'=>4]);
        SuperTeacher::create(['id'=>3,'user_id'=>5]);
    }
}
