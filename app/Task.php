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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['templates_array'];

    public function templates()
    {
        return $this->belongsToMany(Template::class, 'tasks_templates');
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function templates_data()
    {
        return $this->hasMany(TemplateData::class);
    }

    public function getTemplatesArrayAttribute()
    {
        return $this->templates->pluck('id')->toArray();
    }
}
