<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('students')->insert([
          'user_id'=>1
          ,'father_name'=>'bb'
          ,'mother_name'=>'bb'
          ,'father\'s_job'=>'hh'
          ,'mother\'s_job'=>'mm'
          ,'allergic'=>'non'
          ,'bus_id'=>1
      ]);
    }
}
