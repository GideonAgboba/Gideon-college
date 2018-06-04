<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'is_active',
        'surname',
        'firstname',
        'othername',
        'matric',
        'programme_type',
        'session',
        'school',
        'department',
        'programme_mode',
        'level',
        'entry_year',
        'sex',
        'phone',
        'email',
        'password',
        'siemester',
        'date_of_birth',
        'place_of_birth',
        'state_of_origin',
        'local_government',
        'parent_name',
        'parent_address',
        'parent_phone',
        'path',
        'payment_status',
        'application_status',
        'addminsion_letter_id',
        'docket_id',
        'result_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }
}
