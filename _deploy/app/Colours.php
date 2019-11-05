<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colours extends Model
{
    //

    protected $table = 'colours';

    protected $guarded = [];
    
    public function products()
    {
        return $this->belongsTo('App\Products','product_name');
    }

    // public function images

    

}