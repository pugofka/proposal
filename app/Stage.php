<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model
{
    use SoftDeletes;

    protected $table = 'stages';

    protected $fillable = [
        'name',
        'sort',
        'active'
    ];

    protected $dates = ['deleted_at'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
