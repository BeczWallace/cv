<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('lastname');
			$table->string('photo');
			$table->string('email')->unique();
			$table->string('address');
			$table->string('phone');
			$table->string('profile_title');
			$table->text('introduction');
			$table->string('password', 60);
			$table->rememberToken('rememberToken');
			// $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}