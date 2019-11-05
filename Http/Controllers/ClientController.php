<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Client\Http\Requests\ClientRequest;
use Modules\Client\Repositories\ClientRepository;
use Modules\Client\Entities\Client;

class ClientController extends Controller
{

    public function index(Request $request){
        return view('client::index');
    }


    public function create()
    {
        return view('client::create');
    }


    public function store(ClientRequest $request){
        ClientRepository::store($request->all());
        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado.');
    }


    public function edit(Request $request, Client $client)
    {
        return view('client::edit');
    }


    public function update(ClientRequest $request, Client $client){
        ClientRepository::update($client, $request->all());
        return redirect()->route('clients.edit', $client->id)->with('success', 'Cliente atualizado.');
    }


    public function destroy(Request $request, Client $client){
        ClientRepository::destroy($client);
        return back()->with('success', 'Clinte deletado.');
    }

}
