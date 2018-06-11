<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolFeeReceipt extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'invoice_id',
        'order_id',
        'payment_type',
        'payment_hash',
        'description',
        'transaction_date',
        'payment_method',
        'status',
    ];
}
