<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Client\Http\Requests\ShippingCompanyRequest;
use Modules\Client\Repositories\ShippingCompanyRepository;

class ShippingCompanyController extends Controller
{

    public function store(ShippingCompanyRequest $request)
    {
        ShippingCompanyRepository::store($request->all());
        return redirect()->route('clients.index')->with('success', 'Transportadora cadastrado.');
    }

}
