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

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
