<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    protected $table = 'employees';
    protected $fillable = [
        'nik',
        'name',
        'gender',
        'born',
        'birthday',
        'address',
        'email',
        'phone',
        'photo',
    ];
}
