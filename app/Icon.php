<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model {

	protected $table = 'icons';
	public $timestamps = false;
	protected $fillable = array('name');

}