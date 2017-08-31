<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function tasks()
    {
        return $this->belongsToMany(Task::clas, 'tasks_templates');
    }
}
