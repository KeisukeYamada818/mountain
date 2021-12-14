<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mount extends Model
{
    //
    protected $guarded = ["id"];
    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function routes()
    {
        return $this->hasMany('App\Route');
    }
    public function mountsImags()
    {
        return $this->hasMany('App\MountsImag');
    }
}
