<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function mounts()
    {
        return $this->hasMany('App\Mount');
    }
}
