<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vechile extends Model {
    protected $table = 'vechiles';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'police_number',
        'stnk_no',
        'color',
        'merk',
        'no_rangka',
        'no_mesin',
        'photo',
    ];
}
