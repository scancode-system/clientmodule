<?php

namespace Modules\Client\Repositories;

use Modules\Client\Entities\Client;

class ClientRepository
{

	// LOAD
	public static function load($id = null)
	{
		if(is_null($id))
		{
			return Client::with('client_address')->get();		
		} else 
		{
			return Client::with('client_address')->find($id); 
		}
	}

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

	public static function toSelect($value, $description){
		return Client::pluck($description, $value);
	}

	public static function clientByUniqueKeys($id, $corporate_name, $cpf_cnpj){
		if(is_null($cpf_cnpj))
		{
			$client = Client::where('id', $id)->
			orWhere('corporate_name', $corporate_name)->first();
		} else 
		{
			$client = Client::where('id', $id)->
			orWhere('corporate_name', $corporate_name)->
			orWhere('cpf_cnpj', $cpf_cnpj)->first();
		}


		return $client;
	}

	public static function store($data){
		$client = Client::create($data);
		$client->client_address->update($data['client_address']);
		return $client;
	}


	public static function update(Client $client, $data){
		$client->update($data);
		$client->client_address->update($data['client_address']);
		return $client;
	}


	public static function destroy(Client $client){
		$client->delete();
	}

}
