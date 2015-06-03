<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Tag;
use Faker\Factory as Faker;
use CodeCommerce\Helper\Core as FunctionHelper;

class TagTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tags')->truncate();
        
        $faker = Faker::create();
        FunctionHelper::do_times(function() use($faker) {
            Tag::create([
                'name'        => ucfirst($faker->word),
            ]);
        }, 50);        
        
    }
}
