<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Work;

class WorkTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('work')->delete();

		// WorkTableSeeder
		Work::create(array(
				'user_id' => 1,
				'title' => 'Front-end Developer',
				'company' => 'Black Tie Corp.',
				'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
				'date_start' => '2012-06-01',
				'date_end' => null
			));

		// WorkTableSeeder
		Work::create(array(
				'user_id' => 1,
				'title' => 'Web Designer - Intern',
				'company' => 'Onassis Ltd.',
				'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
				'date_start' => '2010-01-01',
				'date_end' => '2012-04-01'
			));
	}
}