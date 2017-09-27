<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {

	protected $table = 'testimonials';
	public $timestamps = false;
	protected $fillable = array('user_id', 'photo', 'text', 'author');

	public function user()
	{
		return $this->belongsTo('User');
	}

}