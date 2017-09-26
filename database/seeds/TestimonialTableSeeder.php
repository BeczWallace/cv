<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Testimonial;

class TestimonialTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('testimonials')->delete();

		// TestimonialsTableSeeder
		Testimonial::create(array(
				'user_id' => 1,
				'photo' => 'testimonials/testimonial-1.jpg',
				'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.',
				'author' => 'John Adams (CEO - Company)'
			));

		// TestimonialsTableSeeder
		Testimonial::create(array(
				'user_id' => 1,
				'photo' => 'testimonials/testimonial-2.jpg',
				'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. <b>I LOVE IT</b>',
				'author' => 'Peter Frownd (Graphic Designer)'
			));

		// TestimonialsTableSeeder
		Testimonial::create(array(
				'user_id' => 1,
				'photo' => 'testimonials/testimonial-3.jpg',
				'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr',
				'author' => 'John Doe (Rockstar)'
			));
	}
}