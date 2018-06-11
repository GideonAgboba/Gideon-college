<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FullTimeQulificationResult extends Model
{
    protected $fillable = [
        'user_id',
        'examination_number',
        'subject1',
        'grade1',
        'subject2',
        'grade2',
        'subject3',
        'grade3',
        'subject4',
        'grade4'
    ];
}
