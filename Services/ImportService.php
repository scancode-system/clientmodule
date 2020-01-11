<?php

namespace Modules\Client\Services;

use Modules\Client\Repositories\SettingClientRepository;
use Modules\Client\Imports\ClientsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ImportService {

	public function import($path)
	{
		if(Storage::exists($path)){
			Excel::import(new ClientsImport, $path);
		}
	}

	public function setting($data)
	{
		SettingClientRepository::update($data);
	}

}
