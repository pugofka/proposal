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
        'task_time',

    ];

    public function templates()
    {
        return $this->belongsTo(Template::class);
    }

    public function tasks()
    {
        return $this->belongsTo(Task::class);
    }

    public function variants()
    {
        return $this->belongsTo(Variant::class);
    }
}
