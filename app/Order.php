<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'vaccine_id', 'user_id', 'customer_name','customer_address', 'customer_phone', 'customer_email', 'quantity', 'total', 'state'
    ];
}
