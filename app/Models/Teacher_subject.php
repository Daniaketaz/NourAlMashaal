<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_subject extends Model
{
    use HasFactory;
    protected $fillable=["subject_name"];
    protected $hidden=['created_at','updated_at'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function lesson(){
        return $this->hasMany(Lesson::class,'teacher_subject_id');
    }
}
