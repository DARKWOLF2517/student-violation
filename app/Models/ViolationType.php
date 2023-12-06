<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationType extends Model
{
    use HasFactory;
    protected $table = 'violation_type';
    protected $primaryKey = 'violation_type_id';
    // public $incrementing = false;


    protected $fillable = [
        'violation_type_id',
        'description',
    ];

    public function sanction()
    {
        return $this->hasMany(SanctionList::class, 'violation_type_id','violation_type_id');
    }

}
