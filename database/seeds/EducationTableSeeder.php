<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Education;

class EducationTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('education')->delete();

		// EducationTableSeeder
		Education::create(array(
				'user_id' => 1,
				'title' => 'Master of Web Design',
				'school' => 'St. Patrick University',
				'type' => '2 Years Course',
				'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the one.',
				'graduation' => '2013-05-01'
			));

		// EducationTableSeeder
		Education::create(array(
				'user_id' => 1,
				'title' => 'Degree of Web Developer',
				'school' => 'Hastings University',
				'type' => '2 Years Course',
				'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
				'graduation' => '2012-06-01'
			));
	}
}