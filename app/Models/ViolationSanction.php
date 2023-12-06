<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationSanction extends Model
{
    use HasFactory;
    protected $table = 'violation_sanction';
    // protected $primaryKey = 'violation_type_id';
    // public $incrementing = false;


    protected $fillable = [
        'violation_list_id',
        'sanction_id',  
    ];
}
