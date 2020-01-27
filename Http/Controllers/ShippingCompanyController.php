<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Client\Http\Requests\ShippingCompanyRequest;
use Modules\Client\Repositories\ShippingCompanyRepository;
use Modules\ImportWidget\Services\SessionService;

class ShippingCompanyController extends Controller
{

	public function store(ShippingCompanyRequest $request)
	{
		ShippingCompanyRepository::store($request->all());
		return redirect()->route('clients.index')->with('success', 'Transportadora cadastrado.');
	}

	public function import(Request $request)
	{
		SessionService::title('Client', 'importShippingCompanies', 'Transportadoras'); 
		return view('client::import_shipping_companies');
	}

}
