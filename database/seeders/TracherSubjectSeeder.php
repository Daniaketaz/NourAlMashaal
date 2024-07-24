<?php

namespace Database\Seeders;

use App\Models\Teacher_subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TracherSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher_subject::create(['id'=>'1','teacher_id'=>'1','subject_id'=>'1','subject_name'=>'aa']);
        Teacher_subject::create(['id'=>'2','teacher_id'=>'1','subject_id'=>'2','subject_name'=>'bb']);
        Teacher_subject::create(['id'=>'3','teacher_id'=>'2','subject_id'=>'3','subject_name'=>'cc']);
    }
}
