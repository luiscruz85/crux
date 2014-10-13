<?php

class UsersTableSeeder extends Seeder {

	private $table;
	private $data;

	public function __construct() {
		$this->table = 'users';
		$this->data = [];
	}

	public function run()
	{
		DB::table($this->table)->truncate();

		$this->data = [
			[
				'fullname'=>'Harlo Interactive Admin',
				'username'=>'harlo',
				'password'=>Hash::make('password'),
				'email'=>'info@harlointeractive.com',
				'role'=>0
			],
		];
		
		DB::table($this->table)->insert($this->data);
	}

}
