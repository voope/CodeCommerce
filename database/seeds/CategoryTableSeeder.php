<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder{

    public function run()
    {
//        Category::create([
//            'name'=>'Books',
//            'description'=>'Description of books'
//        ]);


        DB::table('categories')->truncate();

        $faker = Faker::create();
        foreach(range(1,15) as $i) {
            Category::create([
                'name' => ucfirst($faker->word),
                'description' => $faker->sentence
            ]);
        }

    }

}