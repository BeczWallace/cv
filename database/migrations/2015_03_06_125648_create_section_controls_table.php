<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionControlsTable extends Migration {

	public function up()
	{
		Schema::create('section_controls', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('section');
			$table->boolean('enabled');
			// $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('section_controls');
	}
}