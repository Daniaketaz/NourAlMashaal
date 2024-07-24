<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class week_s_day extends Model
{
    use HasFactory;
    protected $fillable=["day"];
    protected $hidden=['created_at','updated_at'];

    public function schedual(){
        return $this->belongsTo(Schedual::class);
    }
    public function lessons(){
        return $this->hasMany(Lesson::class,'week_s_day_id');
    }
}
