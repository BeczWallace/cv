<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Project;

class ProjectTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('projects')->delete();

		// ProjectsTableSeeder
		Project::create(array(
				'user_id' => 1,
				'title' => 'Photoshop Text Effect',
				'categories' => 'graphics,web',
				'client' => 'Client A',
				'date_start' => '2011-08-01',
				'date_end' => '2012-06-01',
				'url' => 'www.thecompany.com',
				'tags' => 'Cover,Art,Mockup',
				'img1' => 'portfolio/port-1-2.jpg',
				'img2' => 'portfolio/port-1-3.jpg',
				'img3' => 'portfolio/port-1-4.jpg',
				'description' => 'Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. 										<br/> 										This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.',
				'image' => 'portfolio/port-1.jpg'
			));

		// ProjectsTableSeeder
		Project::create(array(
				'user_id' => 1,
				'title' => 'Project for Client B',
				'categories' => 'mockup',
				'image' => 'portfolio/port-2.jpg',
				'img1' => 'portfolio/port-2-2.jpg',
				'description' => 'This is the small version of a portfolio. <br> 										Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content.'
			));

		// ProjectsTableSeeder
		Project::create(array(
				'user_id' => 1,
				'title' => 'Big Project',
				'categories' => 'web,mockup,graphics',
				'client' => 'Client A',
				'date_start' => '2011-08-01',
				'date_end' => '2012-06-01',
				'url' => 'www.thecompany.com',
				'tags' => 'Cover,Art,Mockup',
				'image' => 'portfolio/port-3.jpg',
				'img1' => 'portfolio/port-3-2.jpg',
				'img2' => 'portfolio/port-3-3.jpg',
				'description' => 'Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. 								<br/> 								This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.'
			));

		// ProjectsTableSeeder
		Project::create(array(
				'user_id' => 1,
				'title' => 'App Design',
				'categories' => 'web',
				'date_start' => '2011-08-01',
				'date_end' => '2012-06-01',
				'url' => 'www.thecompany.com',
				'image' => 'portfolio/port-4.jpg',
				'img1' => 'portfolio/port-4-2.jpg',
				'description' => 'Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content.'
			));

		// ProjectsTableSeeder
		Project::create(array(
				'user_id' => 1,
				'title' => 'PSD Mockup',
				'categories' => 'graphics,mockup',
				'client' => 'Client A',
				'date_start' => '2011-08-01',
				'date_end' => '2012-06-01',
				'url' => 'www.thecompany.com',
				'tags' => 'Cover,Art,Mockup',
				'image' => 'portfolio/port-5.jpg'
			));

		// ProjectsTableSeeder
		Project::create(array(
				'user_id' => 1,
				'title' => 'The Shirt',
				'categories' => 'web,mockup',
				'client' => 'Client A',
				'date_start' => '2011-08-01',
				'date_end' => '2012-06-01',
				'url' => 'www.thecompany.com',
				'tags' => 'Cover,Art,Mockup',
				'image' => 'portfolio/port-6.jpg',
				'img1' => 'portfolio/port-6-2.jpg',
				'description' => 'Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. 										<br/> 										This is required when, for example, the final text is not yet available. Dummy text is also known as \'fill text\'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a \'ready-made\' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.'
			));
	}
}