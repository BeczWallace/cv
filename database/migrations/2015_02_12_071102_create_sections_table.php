<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('section_id');
			$table->string('header')->nullable();
			$table->string('sub')->nullable();
			// $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}