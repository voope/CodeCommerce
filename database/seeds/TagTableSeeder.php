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

        factory('CodeCommerce\Tag', 40)->create();


    }
}
