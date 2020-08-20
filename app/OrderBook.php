<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBook extends Model
{
    protected $table = 'order_books';
    protected $fillable = [
        'employee_id',
        'vechile_id',
        'book_id',
        'date',
        'expired_date',
        'booking_date',
        'booking_end',
        'status',
        'reason',
    ];
}
