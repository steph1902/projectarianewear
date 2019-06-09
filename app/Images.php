<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //

    protected $guarded = [];

    protected $table = 'images';

    
    public function products()
    {
        return $this->belongsTo('App\Products');
    }

    public function colours()
    {
        return $this->hasOne('App\Colours','colour_name');
    }
}
