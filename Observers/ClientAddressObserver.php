<?php

namespace Modules\Client\Observers;

use Modules\Client\Entities\ClientAddress;


class ClientAddressObserver
{

	public function creating(ClientAddress $client_address)
	{
		if(!is_null($client_address->postcode))
		{
			$client_address->postcode = preg_replace('/[^0-9]/', '', $client_address->postcode);
		}
	}	


	public function updating(ClientAddress $client_address)
	{
		if(!is_null($client_address->postcode))
		{
			$client_address->postcode = preg_replace('/[^0-9]/', '', $client_address->postcode);
		}
	}	

}
