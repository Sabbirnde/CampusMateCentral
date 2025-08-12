<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'subject', 'due_date', 'description', 'max_size', 'allowed_formats', 'student_id', 'file_path', 'status', 'priority', 'submission_text'
    ];
}
