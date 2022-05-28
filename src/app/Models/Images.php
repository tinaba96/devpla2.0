<?php

namespace App;

#use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
	#use Factory;

	protected $table = "images";
	protected $fillable = [
		'post_id', 'file_name', 'file_path'
	];

	public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
