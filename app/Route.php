<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Route extends Model
{
    use Favoriteable;

    protected $guarded = ["id"];

    public function mount()
    {
        return $this->belongsTo('App\Mount');
    }
}
