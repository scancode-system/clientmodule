<?php

namespace Modules\Client\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Client\Repositories\ClientRepository;
use Exception;

class ClientsImport implements OnEachRow, WithHeadingRow
{

	public function onRow(Row $row)
	{
		try 
		{
			$client_data = $this->parse($row->toArray());

			$client = ClientRepository::clientByUniqueKeys($client_data['id'], $client_data['corporate_name'], $client_data['cpf_cnpj']);

			if($client){
				ClientRepository::update($client, $client_data);
			} else 
			{
				$client = ClientRepository::store($client_data);
			}
		} catch(Exception $e) {
			dd($e);
		}
	}

	private function parse($client_data)
	{
		$client_data['client_address'] = [
			'street' => $client_data['street'],
			'number' => $client_data['number'],
			'apartment' => $client_data['apartment'],
			'neighborhood' => $client_data['neighborhood'],
			'city' => $client_data['city'],
			'st' => $client_data['st'],
			'postcode' => $client_data['postcode'],
		];
		return $client_data;	
	}

}
