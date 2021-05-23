<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['order_id', 'template_id', 'question_id', 'answer'];
}
