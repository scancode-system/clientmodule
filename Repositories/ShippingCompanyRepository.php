<?php

namespace Modules\Client\Repositories;

use Modules\Client\Entities\ShippingCompany;

class ShippingCompanyRepository
{


	// LOAD
	public static function load($id = null)
	{
		if(is_null($id))
		{
			return ShippingCompany::all();		
		} else 
		{
			return ShippingCompany::find($id); 
		}
	}

	public static function loadByName($name)
	{
		return ShippingCompany::where('name', $name)->first();
	}

	public static function toSelect($value, $description){
		return ShippingCompany::pluck($description, $value);
	}

	public static function store($data){
		return ShippingCompany::create($data);
	}


}
