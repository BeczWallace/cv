<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSocialProfilesTable extends Migration {

	public function up()
	{
		Schema::create('social_profiles', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('facebook')->nullable();
			$table->string('dribble')->nullable();
			$table->string('flickr')->nullable();
			$table->string('linkedin')->nullable();
			$table->string('pinterest')->nullable();
			$table->string('dropbox')->nullable();
			$table->string('instagram')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('social_profiles');
	}
}