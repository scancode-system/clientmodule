<?php

namespace Modules\Client\Services;

use Modules\Client\Repositories\SettingClientRepository;
use Modules\Client\Imports\ClientsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportService {

	public function import($path)
	{
		Excel::import(new ClientsImport, $path);
	}

	public function setting($data)
	{
		SettingClientRepository::update($data);
	}

}
