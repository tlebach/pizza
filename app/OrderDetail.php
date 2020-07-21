<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'order_details';

	/**
	 * Get the comments for the blog post.
	 */
	public function order()
	{
		return $this->hasOne('App\Order');
	}

	/**
	 * Get the comments for the blog post.
	 */
	public function pizza()
	{
		return $this->hasOne('App\Pizza');
	}
}
