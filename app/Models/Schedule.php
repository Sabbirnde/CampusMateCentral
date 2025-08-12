<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'day', 'time', 'course', 'code', 'type', 'location', 'instructor', 'is_online'
    ];
}
