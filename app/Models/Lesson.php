<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable=["lesson_number"];
    protected $hidden=['created_at','updated_at'];
    public function week_s_day(){
        return  $this->belongsTo(week_s_day::class);
    }
    public function teacherSubject(){
        return $this->belongsTo(Teacher_subject::class);
    }
    public function token(){
        return $this->hasMany(Token::class,'lesson_id');
    }

}
