    <?php

    use Illuminate\Database\Seeder;


    class ProfileTableSeeder extends Seeder{

        public function run()
        {

            DB::table('profiles')->truncate();

            factory('CodeCommerce\Profile', 10)->create();

        }

    }