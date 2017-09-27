<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkTable extends Migration {

	public function up()
	{
		Schema::create('work', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->string('company');
			$table->text('description');
			$table->date('date_start');
			$table->date('date_end')->nullable();
			// $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('work');
	}
}