    <?php

    use Illuminate\Database\Seeder;
    use Illuminate\Database\Eloquent\Model;
    use CodeCommerce\Product;
    use Faker\Factory as Faker;

    class ProductTableSeeder extends Seeder{

        public function run()
        {
            DB::table('products')->truncate();

    //        Category::create([
    //            'name'=>'Books',
    //            'description'=>'Description of books'
    //        ]);

            $faker = Faker::create();

            foreach(range(1,40) as $i)
            {
                //$price = round(rand(5, 100) + (rand(0, 99) / 10), 2);
                //$price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);

                Product::create([
                    'name' =>$faker->word(),
                    'price' =>$faker->randomNumber(2),
                    'description' =>$faker->sentence(),
                    'featured' => $faker->numberBetween(1, 2),
                    'recommended' =>$faker->numberBetween(1, 2),
                    'category_id' =>$faker->numberBetween(1, 15)
                ]);
            }


        }

    }