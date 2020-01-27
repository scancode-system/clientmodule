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

	public static function loadById($id)
	{
		return ShippingCompany::find($id); 
	}

	public static function loadByName($name)
	{
		return ShippingCompany::where('name', $name)->first();
	}

	public static function loadByUniqueKeys($id, $name)
	{
		return ShippingCompany::where('id', $id)->
		orWhere('name', $name)->first();
	}

	public static function toSelect($value, $description){
		return ShippingCompany::pluck($description, $value);
	}

	public static function store($data){
		return ShippingCompany::create($data);
	}

	public static function update($shipping_company, $data){
		$shipping_company->update($data);
		return $shipping_company;
	}


}
