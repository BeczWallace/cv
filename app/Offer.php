<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model {

	protected $table = 'offers';
	public $timestamps = true;
	protected $fillable = array('user_id', 'title', 'icon', 'description');

	public function user()
	{
		return $this->belongsTo('User');
	}

}