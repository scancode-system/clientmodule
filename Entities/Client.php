<?php

namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Client\Entities\ClientAddress;
use Modules\Client\Entities\ShippingCompany;
use Rocky\Eloquent\HasDynamicRelation;

class Client extends Model
{

	use HasDynamicRelation;

	protected $fillable = ['id', 'corporate_name', 'fantasy_name', 'cpf_cnpj', 'buyer', 'email', 'phone', 'shipping_company_id'];


	public function client_address()
	{
		return $this->hasOne(ClientAddress::class);
	}

	public function shipping_company()
	{
		return $this->belongsTo(ShippingCompany::class);
	}
	
}
