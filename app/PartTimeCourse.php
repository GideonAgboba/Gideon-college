<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartTimeCourse extends Model
{
    protected $fillable = [
        'part_time_department_id',
        'course_code',
        'course_title',
        'course_unit'
    ];
}
