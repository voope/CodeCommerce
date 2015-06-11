    <?php

    use Illuminate\Database\Seeder;
    use Illuminate\Database\Eloquent\Model;
    use CodeCommerce\Product;
    use Faker\Factory as Faker;
    use CodeCommerce\Helper\Core as FunctionHelper;

    class ProductTableSeeder extends Seeder{

        public function run()
        {

            DB::table('products')->truncate();

            factory('CodeCommerce\Product', 40)->create();

        }

    }