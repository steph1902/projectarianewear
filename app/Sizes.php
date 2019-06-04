<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    //
    // protected $fillable = ['*'];
    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo('App\Products');
    }
}

