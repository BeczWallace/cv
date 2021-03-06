<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Philosophy extends Model {

	protected $table = 'philosophy';
	public $timestamps = false;
	protected $fillable = array('user_id', 'text');

	public function user()
	{
		return $this->belongsTo('User');
	}

}