<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Skill;

class SkillTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('skills')->delete();

		// SkillsTableSeeder
		Skill::create(array(
				'user_id' => 1,
				'name' => 'HTML5',
				'percentage' => 80
			));

		// SkillsTableSeeder
		Skill::create(array(
				'user_id' => 1,
				'name' => 'CSS3',
				'percentage' => 95
			));

		// SkillsTableSeeder
		Skill::create(array(
				'user_id' => 1,
				'name' => 'PHP',
				'percentage' => 75
			));

		// SkillsTableSeeder
		Skill::create(array(
				'user_id' => 1,
				'name' => 'Javascript',
				'percentage' => 88
			));
	}
}