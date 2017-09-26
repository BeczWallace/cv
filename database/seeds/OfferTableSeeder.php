<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Offer;

class OfferTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('offers')->delete();

		// OffersTableSeeder
		Offer::create(array(
				'user_id' => 1,
				'title' => 'Interface Design',
				'icon' => 'desktop',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum cursus dictum. Duis molestie velit non augue condimentum iaculis ut at enim.'
			));

		// OffersTableSeeder
		Offer::create(array(
				'user_id' => 1,
				'title' => 'Branding',
				'icon' => 'compass',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum cursus dictum. Duis molestie velit non augue condimentum iaculis ut at enim.'
			));

		// OffersTableSeeder
		Offer::create(array(
				'user_id' => 1,
				'title' => 'Mobile Apps',
				'icon' => 'tablet',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum cursus dictum. Duis molestie velit non augue condimentum iaculis ut at enim.'
			));

		// OffersTableSeeder
		Offer::create(array(
				'user_id' => 1,
				'title' => 'Illustrations',
				'icon' => 'pencil',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum cursus dictum. Duis molestie velit non augue condimentum iaculis ut at enim.'
			));

		// OffersTableSeeder
		Offer::create(array(
				'user_id' => 1,
				'title' => 'Corporate Identity',
				'icon' => 'building-o',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum cursus dictum. Duis molestie velit non augue condimentum iaculis ut at enim.'
			));

		// OffersTableSeeder
		Offer::create(array(
				'user_id' => 1,
				'title' => 'Logo Design',
				'icon' => 'apple',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum cursus dictum. Duis molestie velit non augue condimentum iaculis ut at enim.'
			));
	}
}