<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            'id'=>'1',
            'user_id'=>'1',
            'salary'=>'10.00',
        ]);

        DB::table('teachers')->insert([
            'id'=>'2',
            'user_id'=>'2',
            'salary'=>'10.00',
        ]);
    }
}
