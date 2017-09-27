<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model {

	protected $table = 'social_profiles';
	public $timestamps = false;
	protected $fillable = array('user_id', 'facebook', 'dribble', 'flickr', 'linkedin', 'pinterest', 'dropbox', 'instagram');

	public function user()
	{
		return $this->belongsTo('User');
	}

}