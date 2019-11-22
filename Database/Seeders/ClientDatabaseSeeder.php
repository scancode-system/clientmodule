<?php

namespace Modules\Client\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Client\Database\Seeders\ClientTableSeeder;

class ClientDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ClientTableSeeder::class);
    }
}
