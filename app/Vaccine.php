<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = [
        'name', 'origin', 'allocate','reser_price', 'late_price', 'active', 'image'
    ];
}
