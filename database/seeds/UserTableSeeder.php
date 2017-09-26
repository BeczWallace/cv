<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

		// UserTableSeeder
		User::create(array(
				'name' => 'Alex',
				'lastname' => 'Davids',
				'photo' => 'user-1.jpg',
				'email' => 'info@ikeras.lt',
				'address' => '795 Folsom Ave, Suite 600\nSan Francisco, CA 94107',
				'phone' => '(123) 456-7890',
				'profile_title' => 'CEO. Thuglife. Yolo.',
				'introduction' => '<p>Hi my name is ALEX DAVIDS. I\'m a 28 year old multi talent from San Francisco.</p> <p>Let me give you a short introduction of myself, with all the keyfacts. If you want to know more about  me just further explore this page. <br>Thanks alot for visiting.</p><br> Kind Regards,<img src="img/signature.png" class="img-responsive" alt="" />',
				'password' => Hash::make('test')
			));
	}
}