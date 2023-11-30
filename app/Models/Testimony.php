<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;
    protected $table = 'testimony';
    // protected $primaryKey = ['student_id', 'college_id'];
    // public $incrementing = false;


    protected $fillable = [
        'violation_list_id',
        'name',
        'testimony',
    ];
}
