<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoversTable extends Migration {

	public function up()
	{
		Schema::create('covers', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('image');
			// $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('covers');
	}
}