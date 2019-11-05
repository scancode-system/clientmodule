<?php

namespace Modules\Client\Http\ViewComposers;


use Modules\Dashboard\Services\ViewComposer\ServiceComposer;


class EditComposer extends ServiceComposer {

    private $client;

    public function assign($view){
        $this->client();
    }


    private function client(){
        $this->client = request()->route('client');
        $this->client->load('client_address');
        //dd($this->client->toArray());
    }


    public function view($view){
        $view->with('client', $this->client);
    }

}