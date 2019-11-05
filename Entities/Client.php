<?php

namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Client\Entities\ClientAddress;


class Client extends Model
{

    protected $fillable = ['id', 'corporate_name', 'fantasy_name', 'cpf_cnpj', 'buyer', 'email', 'phone'];


    public function client_address()
	{
		return $this->hasOne(ClientAddress::class);
	}
	
}
