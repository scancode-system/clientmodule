<?php

namespace Modules\Client\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Client\Entities\Client;
use \Exception;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        try{
 factory(Client::class, 50)->create();
        } catch(Exception $e){
            echo "\n".$e->getMessage()."\n\n";
        }
           

    }
}
