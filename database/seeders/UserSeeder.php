<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id'=>1,
            'user_name'=>'dd'
            ,'password'=>'dd'
            ,'first_name'=>'dd'
            ,'last_name'=>'dd'
            ,'birthdate'=>'2024-06-11'
            ,'mobile'=>'123'
            ,'address'=>'ghsdhjd'
            ,'email'=>'dd@gmail.com'
            ,'photo'=>'hf'
           , 'role_id'=>'2'
        ]);

        DB::table('users')->insert([
            'id'=>2,
            'user_name'=>'rr'
            ,'password'=>'rr'
            ,'first_name'=>'dd'
            ,'last_name'=>'dd'
            ,'birthdate'=>'2024-06-11'
            ,'mobile'=>'123456789'
            ,'address'=>'ghsdhjd'
            ,'email'=>'rr@gmail.com'
            ,'photo'=>'hf'
            , 'role_id'=>'2'
        ]);
        DB::table('users')->insert([
            'id'=>3,
            'user_name'=>'rr'
            ,'password'=>'rr'
            ,'first_name'=>'t1'
            ,'last_name'=>'dd'
            ,'birthdate'=>'2024-06-11'
            ,'mobile'=>'123456789'
            ,'address'=>'ghsdhjd'
            ,'email'=>'rr@gmail.com'
            ,'photo'=>'hf'
            , 'role_id'=>'5'
        ]);
        DB::table('users')->insert([
            'id'=>4,
            'user_name'=>'rr'
            ,'password'=>'rr'
            ,'first_name'=>'t2'
            ,'last_name'=>'dd'
            ,'birthdate'=>'2024-06-11'
            ,'mobile'=>'123456789'
            ,'address'=>'ghsdhjd'
            ,'email'=>'rr@gmail.com'
            ,'photo'=>'hf'
            , 'role_id'=>'5'
        ]);
        DB::table('users')->insert([
            'id'=>5,
            'user_name'=>'rr'
            ,'password'=>'rr'
            ,'first_name'=>'t3'
            ,'last_name'=>'dd'
            ,'birthdate'=>'2024-06-11'
            ,'mobile'=>'123456789'
            ,'address'=>'ghsdhjd'
            ,'email'=>'rr@gmail.com'
            ,'photo'=>'hf'
            , 'role_id'=>'5'
        ]);
    }
}
