<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //

    protected $guarded = [];

    
    public function products()
    {
        return $this->belongsTo('App\Products');
    }
}
