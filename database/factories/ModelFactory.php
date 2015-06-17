<?php

$factory->define('CodeCommerce\User', function($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => Hash::make($faker->word),
        'is_admin' => 0 //$faker->boolean()
    ];
});

$factory->define('CodeCommerce\Profile', function($faker) {
    return [
        'cep'        => $faker->numberBetween(10000,  100000),
        'endereco' => $faker->sentence,
        'numero'       => $faker->numberBetween(1,  1000),
        'bairro'    => $faker->word,
        'cidade'   => $faker->word,
        'estado'   => $faker->word,
        'user_id' => $faker->unique()->randomDigit
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
