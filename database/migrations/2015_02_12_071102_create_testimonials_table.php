<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestimonialsTable extends Migration {

	public function up()
	{
		Schema::create('testimonials', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('photo');
			$table->text('text');
			$table->string('author');
			// $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('testimonials');
	}
}