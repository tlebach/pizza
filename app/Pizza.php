<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'pizzas';

	/**
	 * Get the comments for the blog post.
	 */
	public function orderdetail()
	{
		return $this->hasMany('App\OrderDetail');
	}
}
