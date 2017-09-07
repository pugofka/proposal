<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table='templates';

    protected  $fillable=[
      'name'
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'tasks_templates');
    }

    public function templates_data()
    {
        return $this->hasMany(TemplateData::class);
    }
}
