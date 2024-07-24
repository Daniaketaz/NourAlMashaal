<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['id'=>1 ,'Type'=>'dd']);
        Role::create(['id'=>2,'Type'=>'Teacher']);
        Role::create(['id'=>3 ,'Type'=>'Student']);
        Role::create(['id'=>4,'Type'=>'Principal']);
        Role::create(['id'=>5,'Type'=>'SuperTeacher']);
        Role::create(['id'=>6 ,'Type'=>'Bus_Supervisor']);
    }
}
