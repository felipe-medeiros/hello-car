<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function type()
    {
        $this->belongsTo('App\Type');
    }
}
