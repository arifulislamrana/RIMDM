<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'class_level_id',
        'teacher_id',
    ];


    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class);
    }


    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
