<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create(['id'=>'1','name'=>'math']);
        Subject::create(['id'=>'2','name'=>'arabic']);
        Subject::create(['id'=>'3','name'=>'science']);
    }
}
