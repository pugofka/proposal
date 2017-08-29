<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'stage_id'
    ];

    public function templates()
    {
        return $this->belongsToMany(Template::class);
    }
}
