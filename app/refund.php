<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $fillable = [
        'user_id',
        'type_id',
        'value',
        'use_date'
    ];
}
