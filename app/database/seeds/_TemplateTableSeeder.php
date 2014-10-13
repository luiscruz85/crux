<?php

/**
 * 	Template Table Seeder
 *
 * 	Use this base structure when creating a new seed file
 *
 */

class _TemplateTableSeeder extends Seeder {

	private $table;
	private $data;

	public function __construct() {
		$this->table = 'TABLE';
		$this->data  = [];
	}

	public function run()
	{
		DB::table($this->table)->truncate();

		$this->data = [
	        [
				'KEY' => 'VALUE',
	        ],
		];

        DB::table($this->table)->insert($this->data);
	}

}
