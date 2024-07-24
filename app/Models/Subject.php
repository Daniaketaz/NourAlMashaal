<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable=["name"];
    protected $hidden=['created_at','updated_at'];
    public function teacherSubject(){
        return $this->hasMany(Teacher_subject::class);
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'teacher_subject');
    }
}
