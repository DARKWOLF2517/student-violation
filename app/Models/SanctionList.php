<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionList extends Model
{
    use HasFactory;
    protected $table = 'sanction_list';
    protected $primaryKey = 'sanction_id';

    protected $fillable = [
        'violation_type_id',
        'description',
    ];

}
