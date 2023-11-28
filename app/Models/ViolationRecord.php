<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationRecord extends Model
{
    use HasFactory;
    protected $table = 'violation_record';
    protected $primaryKey = 'violation_list_id';
    // public $incrementing = false;


    protected $fillable = [
        'student_id',
        'violation_officer_id',
        'types_of_violation',
        'remarks',
        'status'
    ];
}
