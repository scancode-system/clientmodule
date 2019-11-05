<?php

namespace Modules\Client\Http\ViewComposers;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Client\Repositories\ClientRepository;

class IndexComposer extends ServiceComposer {

    private $search;
    private $clients;

    public function assign($view){
        $this->search();
        $this->clients();
    }


    private function search(){
        if(isset(request()->search)){
            $this->search = request()->search;
        } else {
            $this->search = '';
        }
    }


    private function clients(){
        $this->clients = ClientRepository::list($this->search);
    }


    public function view($view){
        $view->with('clients', $this->clients);
        $view->with('search', $this->search);
    }

}