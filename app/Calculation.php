<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    protected $table = 'calculations';

    protected $fillable = [
        'name',
        'user_id',
        'user_name',
        'user_phone',
        'user_email',
        'cost_per_hour',
        'template_id',
        'tasks',
        'info',
        'additional_tasks'
    ];
}
