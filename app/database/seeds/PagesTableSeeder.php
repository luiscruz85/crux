<?php

/**
* 	Template Table Seeder - Use this base structure when creating a new seed file
*
*/

class PagesTableSeeder extends Seeder {

	private $table;
	private $data;

	public function __construct() {
		$this->table = 'pages';
		$this->data  = [];
	}

	public function run()
	{
		DB::table($this->table)->truncate();

		$this->data = [
			[
			'title'=>'Home',
			'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'slug'=>'home',
			'canonical'=>'http://google.com',
			],
			[
			'title'=>'Contact',
			'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'slug'=>'contact',
			'canonical'=>'http://google.com',
			]
		];

		DB::table($this->table)->insert($this->data);
	}

}
