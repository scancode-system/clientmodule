<?php

namespace Modules\Client\Repositories;

use Modules\Client\Entities\Client;

class ClientRepository
{


	public static function list($search = '', $limit = 10){
		$clients =  Client::where('id', $search)->
		orWhere('corporate_name', 'like', '%'.$search.'%')->
		orWhere('fantasy_name', 'like', '%'.$search.'%')->
		orWhere('cpf_cnpj', $search)->
		orWhere('buyer', 'like', '%'.$search.'%')->
		paginate($limit);

		$clients->appends(request()->query());
		return $clients;
	}


	public static function store($data){
		$client = Client::create($data);
		$client->client_address->update($data['client_address']);
	}


	public static function update(Client $client, $data){
		$client->update($data);
		$client->client_address->update($data['client_address']);
	}


	public static function destroy(Client $client){
		$client->delete();
	}


}
