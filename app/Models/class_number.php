<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_number extends Model
{
    use HasFactory;
    protected $fillable=["ClassNumber",'classs_id'];
    protected $hidden=['created_at','updated_at'];

    public function classs(){
       return  $this->belongsTo(classs::class,'classs_id');
    }
    public function schedual(){
        return $this->hasOne(Schedual::class);
    }

}
