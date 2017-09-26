<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\SocialProfile;

class SocialProfileTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('social_profiles')->delete();

		// SocialProfilesTableSeeder
		SocialProfile::create(array(
				'user_id' => 1,
				'facebook' => '#',
				'dribble' => '#',
				'flickr' => '#',
				'linkedin' => '#',
				'pinterest' => '#',
				'dropbox' => '#',
				'instagram' => '#'
			));
	}
}