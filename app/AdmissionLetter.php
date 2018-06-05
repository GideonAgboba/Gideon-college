<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionLetter extends Model
{
    protected $fillable = [
        'title',
        'body',
        'footer'
    ];
}
