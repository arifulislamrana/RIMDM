<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class ClassLevel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subset::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'class_level_teacher');
    }
}
