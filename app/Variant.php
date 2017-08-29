<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    public function questions()
    {
        return $this->hasMany(Task::class);
    }
}
