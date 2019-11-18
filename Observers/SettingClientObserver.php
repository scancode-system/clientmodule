<?php

namespace Modules\Client\Observers;

use Modules\Client\Entities\SettingClient;
use Illuminate\Support\Facades\DB;

class SettingClientObserver
{

	public function updated(SettingClient $setting_client)
	{
		if($setting_client->isDirty('client_start')){
			DB::statement('ALTER TABLE clients AUTO_INCREMENT = '.$setting_client->client_start.';');
		}
	}	



}
