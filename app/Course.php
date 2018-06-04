<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'user_id',
        'department_title',
        'course_code',
        'course_title',
        'course_status'
    ];
}
