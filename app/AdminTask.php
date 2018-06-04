<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminTask extends Model
{
    protected $fillable = [
       'user_id',
       'author',
       'content',
       'path',
       'task_status'
    ];
}
