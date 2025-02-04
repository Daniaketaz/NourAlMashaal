<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable=['bus_number','driver_name','driver_mobile'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
