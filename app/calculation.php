<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calculation extends Model
{
    protected $table = 'calculations';

    protected $fillable = [
        'user_id',
        'user_name',
        'user_phone'
    ];
}
