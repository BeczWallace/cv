<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAwardsTable extends Migration {

	public function up()
	{
		Schema::create('awards', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('icon');
			$table->string('title');
			$table->text('description');
			$table->date('date');
			// $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('awards');
	}
}