<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Client\Entities\Client;

$factory->define(Client::class, function (Faker $faker) {
	$faker->addProvider(new JansenFelipe\FakerBR\FakerBR($faker));
    return [
        'corporate_name' => $faker->unique()->company,
        'fantasy_name' => $faker->company,
        'cpf_cnpj' => $faker->unique()->cpf,
        'buyer' => $faker->titleMale ,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber 
    ];
});
