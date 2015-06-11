<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('Users')->truncate();

        factory('CodeCommerce\User')->create(
            [
                'name' => "Paulo Rodrigues",
                'email' => "paulo@voope.com.br",
                'password' => Hash::make("qwe@123"),
                'cep' => "95320-000",
                'endereco' => "Rua sei la",
                'numero' => "1233",
                'bairro' => "centro",
                'cidade' => "Nova Prata",
                'estado' => "RS",
                'is_admin' => 1
            ]
        );

        factory('CodeCommerce\User', 10)->create();

    }

}