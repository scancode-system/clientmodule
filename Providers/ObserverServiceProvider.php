<?php

namespace Modules\Client\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Client\Entities\Client;
use Modules\Client\Observers\ClientObserver;
use Modules\Client\Entities\ClientAddress;
use Modules\Client\Observers\ClientAddressObserver;
use Modules\Client\Entities\SettingClient;
use Modules\Client\Observers\SettingClientObserver;


class ObserverServiceProvider extends ServiceProvider {

	public function boot() {
		Client::observe(ClientObserver::class);
		ClientAddress::observe(ClientAddressObserver::class);
		SettingClient::observe(SettingClientObserver::class);
	}

	public function register() {
        //
	}

}
