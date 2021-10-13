<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class Result extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [

        'user_id',
        'subject_id',
        'marks',
        'term',
        'comments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
