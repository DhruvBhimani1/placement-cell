<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    protected $fillable = [
        'student_name',
        'company',
        'package',
        'branch',
        'year',
    ];
}
