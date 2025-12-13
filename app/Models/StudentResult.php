<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    protected $table = 'students_results';

    protected $fillable = [
        'student_name',
        'national_id',
        'narration',
        'drawing',
        'methodology_score',
        'oral_score',
        'written_score',
        'total_score',
        'percentage',
        'grade',
        'certificate_location',
    ];

    protected $casts = [
        'methodology_score' => 'decimal:2',
        'oral_score' => 'decimal:2',
        'written_score' => 'decimal:2',
        'total_score' => 'decimal:2',
        'percentage' => 'decimal:2',
    ];
}
