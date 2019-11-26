<?php

namespace Modules\Client\Repositories;

use Modules\Client\Entities\ShippingCompany;

class ShippingCompanyRepository
{

	public static function toSelect($value, $description){
		return ShippingCompany::pluck($description, $value);
	}

	public static function store($data){
		ShippingCompany::create($data);
	}
 

}
