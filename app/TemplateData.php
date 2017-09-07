<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateData extends Model
{
    protected $table = 'templates_data';

    protected $fillable = [
        'template_id',
        'task_id',
        'variant_id',
        'variant_time',

    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
