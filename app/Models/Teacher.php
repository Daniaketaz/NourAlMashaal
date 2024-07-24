<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable=['id','user_id','experiences','date_of_hiring','salary'];
    protected $hidden=['created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function teacherSubject(){
        return $this->hasMany(Teacher_subject::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'teacher_subject');
    }


}
