<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBelongsTo extends Model
{
    use HasFactory;
    protected $table = 'student_belongs_to';
    // protected $primaryKey = ['student_id', 'college_id'];
    // public $incrementing = false;


    protected $fillable = [
        'student_id',
        'college_id',
        'year_level',
    ];
}
