<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create(['id'=>'1','week_s_day_id'=>'1','teacher_subject_id'=>'1','lesson_number'=>'first']);
        Lesson::create(['id'=>'2','week_s_day_id'=>'1','teacher_subject_id'=>'1','lesson_number'=>'second']);
        Lesson::create(['id'=>'3','week_s_day_id'=>'2','teacher_subject_id'=>'2','lesson_number'=>'third']);
        Lesson::create(['id'=>'4','week_s_day_id'=>'3','teacher_subject_id'=>'3','lesson_number'=>'fourth']);
    }
}
