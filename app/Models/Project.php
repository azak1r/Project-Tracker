<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function projectMaterial()
    {
        return $this->hasMany('App\Models\ProjectMaterial');
    }
    
}
