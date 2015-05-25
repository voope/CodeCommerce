<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->truncate();

//        Category::create([
//            'name'=>'Books',
//            'description'=>'Description of books'
//        ]);

        $faker = Faker::create();

        foreach(range(1,10) as $i)
        {
            User::create([
                'name'=>$faker->name(),
                'email'=>$faker->email(),
                'password'=> Hash::make($faker->word())
            ]);
        }


    }

}