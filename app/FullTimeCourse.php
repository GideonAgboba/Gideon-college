<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FullTimeCourse extends Model
{
    protected $fillable = [
        'full_time_department_id',
        'course_code',
        'course_title',
        'course_unit'
    ];
}
