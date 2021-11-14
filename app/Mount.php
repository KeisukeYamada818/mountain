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
}
