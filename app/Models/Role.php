<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['Type'];
    protected $hidden=['created_at','updated_at'];
    public function user(){
        return $this->hasMany(User::class);
    }
    public function teacher(){
        return $this->hasMany(Teacher::class);
    }

}
