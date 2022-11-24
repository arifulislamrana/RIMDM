<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'heading',
        'body',
        'file',
        'teacher_id',
        'class_level_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class);
    }
}
