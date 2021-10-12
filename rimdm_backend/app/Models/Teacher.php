<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function classLevels()
    {
        return $this->belongsToMany(ClassLevel::class,'class_level_teacher');
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
