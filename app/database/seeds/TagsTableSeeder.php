<?php

/**
* 	Template Table Seeder - Use this base structure when creating a new seed file
*
*/

class TagsTableSeeder extends Seeder {

	private $table;
	private $data;

	public function __construct() {
		$this->table = 'tags';
		$this->data  = [];
	}

	public function run()
	{
		DB::table($this->table)->truncate();

		$this->data = [
			['name'=>'Subject 1'],
			['name'=>'Subject 2'],
			['name'=>'Subject 3'],
			['name'=>'Subject 4'],
			['name'=>'Subject 5']
		];

		DB::table($this->table)->insert($this->data);
	}

}
