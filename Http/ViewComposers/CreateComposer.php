<?php

namespace Modules\Client\Http\ViewComposers;


use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Client\Repositories\ShippingCompanyRepository;


class CreateComposer extends ServiceComposer {

    private $select_shipping_companies;

    public function assign($view){
        $this->selectShippingCompanies();
    }


    private function selectShippingCompanies(){
        $this->select_shipping_companies = ShippingCompanyRepository::toSelect('id', 'description');
    }


    public function view($view){
        $view->with('select_shipping_companies', $this->select_shipping_companies);
    }

}