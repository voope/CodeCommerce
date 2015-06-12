<?php

$factory->define('CodeCommerce\User', function($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => Hash::make($faker->word),
        'is_admin' => 0 //$faker->boolean()
    ];
});

$factory->define('CodeCommerce\Category', function($faker) {
    return [
        'name' => ucfirst($faker->word),
        'description' => $faker->sentence
    ];
});

$factory->define('CodeCommerce\Product', function($faker) {
    return [
        'name'        => ucfirst($faker->word),
        'description' => $faker->paragraph,
        'price'       => $faker->randomFloat(2, 0.01, 10000),
        'featured'    => $faker->boolean(),
        'recommended'   => $faker->boolean(),
        'category_id' => $faker->numberBetween(1, 15),
    ];
});


$factory->define('CodeCommerce\Tag', function($faker) {
    return [
        'name'        => ucfirst($faker->word),
    ];
});
