<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;

class CategoryTableSeeder extends Seeder{

    public function run()
    {
//        Category::create([
//            'name'=>'Books',
//            'description'=>'Description of books'
//        ]);


        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 15)->create();

    }

}