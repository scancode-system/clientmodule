<?php

namespace Modules\Client\Repositories;

use Modules\Client\Entities\SettingClient;


class SettingClientRepository
{

	public static function load(){
		return $setting_client = SettingClient::first();
	}

	public static function update($data){
		(SettingClient::first())->update($data);
	}

}
