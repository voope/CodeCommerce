<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();


        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call('CategoryTableSeeder');
        $this->call(   'UserTableSeeder');
        $this->call( 'ProductTableSeeder');
        $this->call(     'TagTableSeeder');
        $this->call( 'ProductsTagsSeeder');
        $this->call( 'ProfileTableSeeder');

        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');

	}

}
