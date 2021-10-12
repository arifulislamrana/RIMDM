<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class);
    }



    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
