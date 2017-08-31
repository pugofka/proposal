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

    public function questions()
    {
        return $this->hasMany(Task::class);
    }

    public function templates_data()
    {
        return $this->hasMany(TemplateData::class);
    }
}
