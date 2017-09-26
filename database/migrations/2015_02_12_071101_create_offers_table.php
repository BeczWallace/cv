<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->string('icon');
			$table->text('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}