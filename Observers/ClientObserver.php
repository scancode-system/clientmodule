<?php

namespace Modules\Client\Observers;

use Modules\Client\Entities\Client;
use Modules\Client\Entities\ClientAddress;


class ClientObserver
{

	public function created(Client $client)
	{
		ClientAddress::create(['client_id' => $client->id]);
	}	

}
