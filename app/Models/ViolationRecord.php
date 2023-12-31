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
        'violation_type_id',
        'remarks',
        'status'
    ];


    public function users()
    {
        return $this->hasOne(User::class,'student_id','id');
    }
    public function violation_sanction()
    {
        return $this->belongsTo(ViolationSanction::class,'violation_list_id','violation_list_id');
    }
}

