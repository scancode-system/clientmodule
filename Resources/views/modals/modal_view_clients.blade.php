@modal_view(['modal_id' => 'clients_view_'.$client->id, 'edit_route' => 'clients.edit', 'model_id' => $client->id])

@slot('title')
Cliente #{{ '1' }}
@endslot
<h5>Dados</h5>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Nome Fantasia: </strong></div>
	<div class="col-md-5">{{ $client->fantasy_name }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Razão Social: </strong></div>
	<div class="col-md-5">{{ $client->corporate_name }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>CPF/CNPJ: </strong></div>
	<div class="col-md-5">{{ $client->cpf_cnpj }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Nome Comprador: </strong></div>
	<div class="col-md-5">{{ $client->buyer }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Email: </strong></div>
	<div class="col-md-5">{{ $client->email }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Telefone: </strong></div>
	<div class="col-md-5">{{ $client->phone }}</div>
</div>
<hr>
<h5>Endereço</h5>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Rua: </strong></div>
	<div class="col-md-5">{{ $client->client_address->street }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Número: </strong></div>
	<div class="col-md-5">{{ $client->client_address->number }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Complemento: </strong></div>
	<div class="col-md-5">{{ $client->client_address->apartment }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Bairro: </strong></div>
	<div class="col-md-5">{{ $client->client_address->neighborhood }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Cidade: </strong></div>
	<div class="col-md-5">{{ $client->client_address->city }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>UF: </strong></div>
	<div class="col-md-5">{{ $client->client_address->st }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>CEP: </strong></div>
	<div class="col-md-5">{{ $client->client_address->postcode }}</div>
</div>


@endmodal_view