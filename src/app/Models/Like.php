<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $table = 'likes';

	public function user()
	{
		return $this->belongTo('App\User');
	}

	public function outfit()
	{
		return $this->belongTo('App\Post');
	}

	/**
	 *
	 *@var array
	 */
	protected $fillable = [
		'user_id', 'post_id'
	];

	protected $guarded = [
		'id'
	];


}
