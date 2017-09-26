<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $table = 'clients';
	public $timestamps = true;
	protected $fillable = array('user_id', 'Name', 'image');

	public function user()
	{
		return $this->belongsTo('User');
	}

}