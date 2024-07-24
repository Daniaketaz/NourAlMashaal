<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=['id','user_id','father_name','mother_name','father\'s_job','mother\'s_job'
                            ,'allergic','Bus_id','schedual_id'];

    protected $hidden=['created_at','updated_at'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function bus(){
        return $this->belongsTo(Bus::class,'Bus_id');
    }
    public function schedual()
    {
        return $this->belongsTo(Schedual::class, 'schedual_id');
    }
}
