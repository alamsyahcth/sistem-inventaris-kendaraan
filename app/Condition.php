<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model {
    protected $table = 'conditions';
    protected $fillable = ['vechile_id','damage_location'];
}
