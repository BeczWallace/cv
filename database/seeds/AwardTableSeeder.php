<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Award;

class AwardTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('awards')->delete();

		// AwardsTableSeeder
		Award::create(array(
				'user_id' => 1,
				'icon' => 'trophy',
				'title' => 'AWWWARDS',
				'description' => 'Website of the day.',
				'date' => '2014-02-02'
			));

		// AwardsTableSeeder
		Award::create(array(
				'user_id' => 1,
				'icon' => 'code',
				'title' => 'CSS DESIGN AWARDY',
				'description' => 'Best CSS Code website of the month.',
				'date' => '2013-09-01'
			));

		// AwardsTableSeeder
		Award::create(array(
				'user_id' => 1,
				'icon' => 'wheelchair',
				'title' => 'Page Usability Award',
				'description' => 'Best usability for disabled persons.',
				'date' => '2014-11-22'
			));

		// AwardsTableSeeder
		Award::create(array(
				'user_id' => 1,
				'icon' => 'picture-o',
				'title' => 'Shoot of the Day',
				'description' => 'Awarded beach photo'
			));

		// AwardsTableSeeder
		Award::create(array(
				'user_id' => 1,
				'icon' => 'lightbulb-o',
				'title' => 'Smartest Idea',
				'description' => 'Best idea in a brainstorming for revolutionary navigation.',
				'date' => '2013-09-01'
			));

		// AwardsTableSeeder
		Award::create(array(
				'user_id' => 1,
				'icon' => 'heart',
				'title' => 'Most loved Item',
				'description' => 'Most (per month) likes on a homepage PSD design',
				'date' => '2014-11-22'
			));
	}
}