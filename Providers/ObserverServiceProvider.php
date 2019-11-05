<?php

namespace Modules\Client\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Client\Entities\Client;
use Modules\Client\Observers\ClientObserver;


class ObserverServiceProvider extends ServiceProvider {

	public function boot() {
		Client::observe(ClientObserver::class);
	}

	public function register() {
        //
	}

}
