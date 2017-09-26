<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEducationTable extends Migration {

	public function up()
	{
		Schema::create('education', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->string('school');
			$table->text('description');
			$table->date('graduation');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('education');
	}
}