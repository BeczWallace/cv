<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Section;

class SectionTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('sections')->delete();

		// SectionsTableSeeder
		Section::create(array(
				'user_id' => 1,
				'section_id' => 'head',
				'header' => 'Hi, I\'m ALEX DAVIDS',
				'sub' => 'CEO.|Hero.|Batman.|From London town'
			));

		// SectionsTableSeeder
		Section::create(array(
				'user_id' => 1,
				'section_id' => 'welcome',
				'header' => 'Alex Davids',
				'sub' => 'CEO. Thuglife. Yolo.'
			));

		// SectionsTableSeeder
		Section::create(array(
				'user_id' => 1,
				'section_id' => 'offers',
				'sub' => 'What I offer'
			));

		// SectionsTableSeeder
		Section::create(array(
				'user_id' => 1,
				'section_id' => 'clients',
				'header' => 'Clients',
				'sub' => 'Some happy clients'
			));

		// SectionsTableSeeder
		Section::create(array(
				'user_id' => 1,
				'section_id' => 'cv',
				'header' => 'Curriculum Vitae',
				'sub' => 'Get to know where I\'ve proven my skills'
			));

		// SectionsTableSeeder
		Section::create(array(
				'user_id' => 1,
				'section_id' => 'portfolio',
				'header' => 'Projects',
				'sub' => 'Projects I worked on'
			));

		// SectionsTableSeeder
		Section::create(array(
				'user_id' => 1,
				'section_id' => 'testimonials',
				'header' => 'Testimonials',
				'sub' => 'What my clients think about me'
			));

		// SectionsTableSeeder
		Section::create(array(
				'user_id' => 1,
				'section_id' => 'awards',
				'header' => 'Awards',
				'sub' => 'Some Awards I received'
			));

		// SectionsTableSeeder
		Section::create(array(
				'user_id' => 1,
				'section_id' => 'contact',
				'header' => 'Get in touch',
				'sub' => 'No matter what. Just do it'
			));

		Section::create(array(
				'user_id' => 1,
				'section_id' => 'skills',
				'header' => 'What I can do',
				'sub' => 'Everything'
			));
	}
}