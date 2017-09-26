<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Client;

class ClientTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('clients')->delete();

		// ClientsTableSeeder
		Client::create(array(
				'user_id' => 1,
				'Name' => 'client 1',
				'image' => 'clients/client-01.png'
			));

		// ClientsTableSeeder
		Client::create(array(
				'user_id' => 1,
				'Name' => 'client 2',
				'image' => 'clients/client-02.png'
			));

		// ClientsTableSeeder
		Client::create(array(
				'user_id' => 1,
				'Name' => 'client 3',
				'image' => 'clients/client-03.png'
			));

		// ClientsTableSeeder
		Client::create(array(
				'user_id' => 1,
				'Name' => 'client 4',
				'image' => 'clients/client-04.png'
			));

		// ClientsTableSeeder
		Client::create(array(
				'user_id' => 1,
				'Name' => 'client 5',
				'image' => 'clients/client-05.png'
			));

		// ClientsTableSeeder
		Client::create(array(
				'user_id' => 1,
				'Name' => 'client 6',
				'image' => 'clients/client-06.png'
			));

		// ClientsTableSeeder
		Client::create(array(
				'user_id' => 1,
				'Name' => 'client 7',
				'image' => 'clients/client-07.png'
			));

		// ClientsTableSeeder
		Client::create(array(
				'user_id' => 1,
				'Name' => 'client 8',
				'image' => 'clients/client-08.png'
			));
	}
}