<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedual extends Model
{
    use HasFactory;
    protected $fillable=["classNumber_id"];
    protected $hidden=['created_at','updated_at'];
    public function classNumber()
    {
        return $this->belongsTo(class_number::class,'classNumber_id');
    }
    public function week_s_day(){
        return $this->hasMany(week_s_day::class,'schedual_id');
    }
    public function student(){
        return $this->hasMany(Student::class,'schedual_id');
    }
}
