<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

	protected $table = 'skills';
	public $timestamps = false;
	protected $fillable = array('user_id', 'name', 'percentage');

	public function user()
	{
		return $this->belongsTo('User');
	}

}