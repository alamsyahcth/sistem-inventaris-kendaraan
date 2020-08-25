<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookFinish extends Model
{
    protected $table = 'book_finishes';
    protected $fillable = [
        'book_id',
        'book_finish_code',
        'date',
        'status'
    ];
}
