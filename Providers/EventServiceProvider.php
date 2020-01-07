<?php

namespace Modules\Client\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Client\Events\BeforeImportEvent;
use Modules\Client\Listeners\BeforeImportClientListener;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider 
{

	public function boot() 
	{
		 Event::listen(BeforeImportEvent::class, BeforeImportClientListener::class);
	}

	public function register() 
	{

	}

}
