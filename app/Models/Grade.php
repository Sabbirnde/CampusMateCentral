<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'course', 'code', 'assignment_name', 'grade', 'max_grade', 'weight', 'submitted_date', 'current_grade', 'credits'
    ];
}
