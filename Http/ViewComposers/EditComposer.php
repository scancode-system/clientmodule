<?php

namespace Modules\Client\Http\ViewComposers;


use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Client\Repositories\ShippingCompanyRepository;

class EditComposer extends ServiceComposer {

    private $client;
        private $select_shipping_companies;

    public function assign($view){
        $this->client();
         $this->selectShippingCompanies();
    }


    private function client(){
        $this->client = request()->route('client');
        $this->client->load('client_address');
        //dd($this->client->toArray());
    }


    private function selectShippingCompanies(){
        $this->select_shipping_companies = ShippingCompanyRepository::toSelect('id', 'name');
    }

    public function view($view){
        $view->with('client', $this->client);
        $view->with('select_shipping_companies', $this->select_shipping_companies);
    }

}