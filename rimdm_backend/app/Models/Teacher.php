<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    public $timestamps = false;

    protected $fillable = [

        'name',
        'designation',
        'phone',
        'email',
        'role_id',
        'qualification',
        'img',
        'password',

    ];

    public function classLevels()
    {
        return $this->belongsToMany(ClassLevel::class,'class_level_teacher');
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
