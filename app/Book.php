<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'order_books_id',
        'book_code',
        'date',
        'status'
    ];
}
