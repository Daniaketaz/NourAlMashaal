<?php

namespace Database\Seeders;

use App\Models\Token;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Token::create(['id'=>1,'lesson_id'=>1,'token'=>'hello','type_id'=>1]);
        Token::create(['id'=>2,'lesson_id'=>2,'token'=>'hello','type_id'=>2]);
        Token::create(['id'=>3,'lesson_id'=>3,'token'=>'hello','type_id'=>1]);
        Token::create(['id'=>4,'lesson_id'=>4,'token'=>'hello','type_id'=>2]);
    }
}
