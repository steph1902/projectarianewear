<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	//

	protected $table = 'products';

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
		return $this->hasMany('App\Images','product_name');
	}
	public function Sizes()
	{
		return $this->hasMany('App\Sizes','product_name');
	}
	public function Colours()
	{
		return $this->hasMany('App\Colours','product_name');
	}
}
