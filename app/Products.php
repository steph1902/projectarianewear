<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
	protected $fillable = 
	[
		'product_name',
		'product_price',
		'product_size_in_cm',
		'product_material',
		'product_description',
		'product_wash_instruction',
		'product_stock'
	];
	public function Images()
	{
		return $this->hasMany('App\Images');
	}
	public function Sizes()
	{
		return $this->hasMany('App\Sizes');
	}
	public function Colours()
	{
		return $this->hasMany('App\Colours');
	}
}
