<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model {

	protected $table = 'covers';
	public $timestamps = true;
	protected $fillable = array('user_id', 'image');

	public function user()
	{
		return $this->belongsTo('User');
	}

}