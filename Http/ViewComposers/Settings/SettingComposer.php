<?php

namespace Modules\Client\Http\ViewComposers\Settings;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Client\Repositories\SettingClientRepository;


class SettingComposer extends ServiceComposer {

    private $setting_client;

    public function assign($view){
        $this->setting_client();
    }


    private function setting_client(){
        $this->setting_client = SettingClientRepository::load();
    }


    public function view($view){
        $view->with('setting_client', $this->setting_client);
    }

}