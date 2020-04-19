<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public $timestamps = false;

    public function Materials()
    {
        return $this->belongsToMany('App\Models\ProjectMaterial');
    }
}
