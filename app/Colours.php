<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colours extends Model
{
    //
    protected $guarded = [];
    public function products()
    {
        return $this->belongsTo('App\Products');
    }

}