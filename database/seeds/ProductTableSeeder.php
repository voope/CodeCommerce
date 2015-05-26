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

            foreach(range(1,10) as $i)
            {
                //$price = round(rand(5, 100) + (rand(0, 99) / 10), 2);
                //$price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);

                Product::create([

                    'name'=>$faker->word(),
                    'description'=>$faker->sentence(),
                    'price'=>$faker->randomNumber(2),
                    'featured'=>$faker->boolean(),
                    'recommended'=>$faker->boolean(),
                    'category_id'=>$faker->numberBetween(1,15)
                ]);
            }


        }

    }