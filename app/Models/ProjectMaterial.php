<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMaterial extends Model
{
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function materials()
    {
        return $this->hasMany('App\Models\Material');
    }
}
