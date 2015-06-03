    <?php

    use Illuminate\Database\Seeder;
    use Illuminate\Database\Eloquent\Model;
    use CodeCommerce\Product;
    use Faker\Factory as Faker;
    use CodeCommerce\Helper\Core as FunctionHelper;

    class ProductTableSeeder extends Seeder{

        public function run()
        {

    //        Category::create([
    //            'name'=>'Books',
    //            'description'=>'Description of books'
    //        ]);

            DB::table('products')->truncate();

            $faker = Faker::create();
            FunctionHelper::do_times(function() use($faker) {
                Product::create([
                    'name'        => ucfirst($faker->word),
                    'description' => $faker->paragraph,
                    'price'       => $faker->randomFloat(2, 0.01, 10000),
                    'featured'    => $faker->boolean(),
                    'recommended'   => $faker->boolean(),
                    'category_id' => $faker->numberBetween(1, 15),
                ]);
            }, 50);


        }

    }