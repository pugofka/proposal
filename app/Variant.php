<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table = 'variants';

    protected $fillable = [
        'name',
        'task_id'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function templates_data()
    {
        return $this->hasMany(TemplateData::class);
    }
}
