<?php

/**
* 	Template Table Seeder - Use this base structure when creating a new seed file
*
*/

class SettingsTableSeeder extends Seeder {
	private $table;
	private $data;

	public function __construct() {
		$this->table = 'settings';
		$this->data  = [];
	}

	public function run()
	{
		DB::table($this->table)->truncate();

		$this->data = [
			['name'=>'Sitename', 'slug' => 'sitename', 'value'=>'Crux' ],
			['name'=>'Facebook URL', 'slug'=>'facebook', 'value'=>'http://facebook.com/FACEBOOK_NAME'],
			['name'=>'Default Meta Description', 'slug'=>'meta_description', 'value'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
			['name'=>'Language', 'slug'=>'lang', 'value'=> 'en-US']
		];

		DB::table($this->table)->insert($this->data);
	}

}
