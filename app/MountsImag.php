<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MountsImag extends Model
{
    //
    protected $guarded = ["id"];
    protected $table = 'mounts_image';
    public function mount()
    {
        return $this->belongsTo('App\Mount');
    }
}
