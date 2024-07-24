<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classs extends Model
{
    use HasFactory;
    protected $fillable=["name"];
    protected $hidden=['created_at','updated_at'];
    public function classNumber()
    {
        return $this->hasMany(class_number::class);
    }
    public function superTeacher(){
        return $this->belongsTo(SuperTeacher::class,'super_teacher_id');
    }
}
