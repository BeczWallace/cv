<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Cover;

class CoverTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('covers')->delete();

		// CoversTableSeeder
		Cover::create(array(
				'user_id' => 1,
				'image' => 'bg-head-1.jpg'
			));

		// CoversTableSeeder
		Cover::create(array(
				'user_id' => 1,
				'image' => 'bg-head-2.jpg'
			));
	}
}