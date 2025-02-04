<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable=["date",'token','lesson_id','type_id'];
    protected $hidden=['created_at','updated_at'];
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
