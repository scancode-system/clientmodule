<?php

namespace Modules\Client\Observers;

use Modules\Client\Entities\Client;
use Modules\Client\Entities\ClientAddress;


class ClientObserver
{

	public function creating(Client $client)
	{
		if(!is_null($client->cpf_cnpj))
		{
			$client->cpf_cnpj = preg_replace('/[^0-9]/', '', $client->cpf_cnpj);
		}
	}	

	public function created(Client $client)
	{
		ClientAddress::create(['client_id' => $client->id]);
	}	

	public function updating(Client $client)
	{
		if(!is_null($client->cpf_cnpj))
		{
			$client->cpf_cnpj = preg_replace('/[^0-9]/', '', $client->cpf_cnpj);
		}
	}	

}
