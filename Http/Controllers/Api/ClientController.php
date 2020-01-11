<?php

namespace Modules\Client\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Client\Repositories\ClientRepository;
use Modules\Client\Http\Requests\ClientRequest;
use Modules\Client\Entities\Client;

class ClientController extends Controller
{

    public function load(Request $request, $id = null)
    {
        return ClientRepository::load($id);
    }

    public function store(ClientRequest $request)
    {
        $data = $request->all();
        $data['client_address'] = [
            'street' => isset($data['street'])?$data['street']:null,
            'number' => isset($data['number'])?$data['number']:null,
            'apartment' => isset($data['apartment'])?$data['apartment']:null,
            'neighborhood' => isset($data['neighborhood'])?$data['neighborhood']:null,
            'city' => isset($data['city'])?$data['city']:null,
            'st' => isset($data['st'])?$data['st']:null,
            'postcode' => isset($data['postcode'])?$data['postcode']:null,
        ];
        $client = ClientRepository::store($data);
        return $client;
    }   
    
}


