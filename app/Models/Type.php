<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable=["type"];
    protected $hidden=['created_at','updated_at'];
    public function token(){
        return $this->hasMany(Token::class,'type_id');
    }
}
