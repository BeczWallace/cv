<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('categories')->delete();

		// CategoriesTableSeeder
		Category::create(array(
				'name' => 'Graphics'
			));

		// CategoriesTableSeeder
		Category::create(array(
				'name' => 'Web'
			));

		// CategoriesTableSeeder
		Category::create(array(
				'name' => 'Mockup'
			));
	}
}