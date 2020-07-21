<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';
	
	/**
	 * Get the comments for the blog post.
	 */
	public function orderdetails()
	{
		return $this->hasMany('App\OrderDetail');
	}
}
