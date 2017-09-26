<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model {

	protected $table = 'icons';
	public $timestamps = true;
	protected $fillable = array('name');

}