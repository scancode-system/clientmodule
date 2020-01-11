<?php

namespace Modules\Client\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Client\Repositories\ShippingCompanyRepository;

class ShippingCompanyController extends Controller
{

    public function load()
    {
        return ShippingCompanyRepository::load();
    }

    public function store(Request $request)
    {
        return ShippingCompanyRepository::store($request->all());
    }

}
