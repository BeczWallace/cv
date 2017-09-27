<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->string('categories');
			$table->string('client')->nullable();
			$table->date('date_start')->nullable();
			$table->date('date_end')->nullable();
			$table->string('url')->nullable();
			$table->string('tags');
			$table->string('image')->nullable();
			$table->string('img1')->nullable();
			$table->string('img2')->nullable();
			$table->string('img3')->nullable();
			$table->text('description');
			// $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('projects');
	}
}